# Permissions

## Installation

You can install the package via composer:

```bash
composer config repositories.laravel-permissions github https://github.com/WebWhales/Laravel-Permissions
composer require webwhales/laravel-permissions:dev-master
```

Documentation for spatie/laravel-permission can be found [here](https://spatie.be/docs/laravel-permission/v5/installation-laravel)

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --tag="permissions-config"
```

Don't forget to add the `HasRoles` trait to your `User` model and run the migrations:

```bash
php artisan migrate
```

## Usage

Optionally you can change the deploy type in the config file `permission.php`:

```php
return [
    // ...

    /**
     * The default permission deploy type.
     *
     * Available options:
     * - roles-and-permissions
     * - permissions-only
     */
    'deploy-type' => 'roles-and-permissions',

    // ...
];
```

```bash
php artisan deploy:permissions
```
