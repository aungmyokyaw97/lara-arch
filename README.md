# Lara-Arch CLI Toolkit Package

The Lara-Arch CLI Toolkit Package is a comprehensive collection of tools and components designed to enhance your Laravel application's command-line interface (CLI) capabilities. This package offers a set of features to streamline development, improve code organization, and optimize command-line interactions.

- DTO
- Service
- Trait
- Enum
- Repository
 
## Installation
Install the Lara-Arch CLI Toolkit Package using Composer:
```
composer require aungmyokyaw/lara-arch
```


## Features
# DTO CLI Generator
Create Data Transfer Objects (DTOs) effortlessly using the DTO CLI generator. Design DTOs to encapsulate data and improve data integrity between different parts of your application.
```php
php artisan make:dto [Filename]
```
# Service CLI Generator
Generate service classes using the Service CLI generator. Services are vital for encapsulating business logic and promoting a clean separation of concerns within your application.
```php
php artisan make:service [Filename]
```
# Trait CLI Generator
Design and generate reusable traits using the Trait CLI generator. Traits enable you to encapsulate common functionality that can be shared across multiple classes.
```php
php artisan make:trit [Filename]
```

# Enum CLI Generator
Simplify the creation of enumerations (enums) in your Laravel application using the Enum CLI generator. Define custom enum types with ease and have them automatically generated with the appropriate values and methods.
```php
php artisan make:enum [Filename]
```
# Enum Helper
 - enum_from_key($enumCases, $key)
 - enum_from_value($enumCases, $value)

This two Enum helper functions for working with enums in your Laravel application. Here's a sample usage of the two helper functions.
```php
enum Status : int {
    case Pending = 0;
    case Approved = 1;
}
```
#### enum_from_key($enumCases, $key)
```
enum_from_key(Status::cases(),'Approved') // output = 1
```
#### enum_from_value($enumCases, $value)
```
enum_from_value(Status::cases(),0) // output = "Pending"
```
# Repository CLI Generator
Efficiently generate repository classes using the Repository CLI generator. Implement the repository pattern to abstract database operations and promote clean architecture. This repository comes with pre-built CRUD operations that can be used directly or customized as needed.
```php
php artisan make:repository [Filename] --model=[ModelName]
```
### Here's a sample usage of the repository for CRUD operations.
```php
php artisan make:repository UserRepository --model=User
```
This will create a repository file named UserRepository.php within the app/repositories directory.
```php
namespace App\Repositories;

use Amk\LaraArch\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository {
    public function getModel(){
        return User::class;
    }
}
```
Example usage for CRUD : 
```php
$userRepository = new UserRepository();

// Create a new user
$userRepository->create(['name' => 'John Doe', 'email' => 'john@example.com']);

// Find a user by ID
$userRepository->find(1);

// Update a user's information
$userRepository->update(1, ['name' => 'Updated Name']);

// Delete a user
$userRepository->delete(1);

// Retrieve all users
$users = $userRepository->all();

// Retrieve all users with paginate
$users = $userRepository->paginate(10);

// Retrieve users using where query
$users = $userRepository->all(['email' => 'john@example.com']);

```



