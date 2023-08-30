<?php

namespace Amk\LaraArch\Traits;

use Illuminate\Support\Str;
use InvalidArgumentException;

use function App\Helpers\enum_key;

trait ReplaceModel{

    protected function buildModelReplacements(array $replace): array
    {
        $modelClass = $this->parseModel($this->option('model'));

        return array_merge($replace, [
            '{{ FullModelClass }}' => $modelClass,
            '{{ ModelClass }}'     => class_basename($modelClass),
        ]);
    }


    protected function parseModel($model): string
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        $model = ltrim($model, '\\/');

        $model = str_replace('/', '\\', $model);

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($model, $rootNamespace)) {
            return $model;
        }

        $model = is_dir(app_path('Models'))
            ? $rootNamespace . 'Models\\' . $model
            : $rootNamespace . $model;

        return $model;
    }

}