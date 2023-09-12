# Permissions

## Installation

You can install the package via composer:

```bash
composer config repositories.laravel-permissions github https://github.com/WebWhales/Laravel-Permissions
composer require webwhales/laravel-permissions:dev-master
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="permissions-config"
```

## Usage

```php
php artisan deploy:permissions
```
