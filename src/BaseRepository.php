<?php

namespace Amk\LaraArch;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

    /**
     * @var Model
     */
    protected $model;
    
    /**
     * @var Application
     */
    protected $app;
    
    /**
     * __construct
     *
     * @param  Application
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * model
     *
     * @return void
     */
    abstract public function getModel();

    /**
     * makeModel
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->getModel());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->getModel()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
    
    /**
     * paginate
     *
     * @param  integer $perPage
     * @param  array $where
     * @param  array $columns
     * @return Model
     */
    public function paginate($perPage, $where = [], $columns = ['*'])
    {
        $query = $this->allQuery($where);

        return $query->paginate($perPage, $columns);
    }

    /**
     * allQuery
     *
     * @param  array $where
     * @param  integer|null $limit
     * @return Query
     */
    public function allQuery($where = [] , $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($where)) {
            foreach($where as $key => $value) {
                $query->where($key,$value);
            }
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }
    
    /**
     * all
     *
     * @param  array $where
     * @param  integer|null $limit
     * @param  array $columns
     * @return Model
     */
    public function all($where = [], $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($where, $limit);

        return $query->get($columns);
    }

    /**
     * create
     *
     * @param  array $input
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }
    
    /**
     * find
     *
     * @param  integer $id
     * @param  array $columns
     * @return Model
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->findOrFail($id, $columns);
    }
    
    /**
     * update
     *
     * @param  integer $id
     * @param  array $input
     * @return Model
     */
    public function update($id,$input)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->update();

        return $model;
    }
    
    /**
     * delete
     *
     * @param  integer $id
     * @return boolean
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }


}