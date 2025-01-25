# Hawkiq AdmLTE Package

- Warning : This Package is at very early phase of development using it in production might not a good idea use at your own risk.

Hawkiq AdmLTE is a Laravel package designed for seamless integration of the AdminLTE v4 beta template, providing a robust foundation for admin dashboards. This package simplifies the installation, configuration, and usage of AdminLTE with Bootstrap 5 and related components.

---

## Installation

Follow these steps to install and set up the Hawkiq AdmLTE package:

### Step 1: Require the Package

Note : This package used an expermintal AdminLTE V4 so it wont be installed on Laravel project unless you mark `"minimum-stability"` to `"dev"` in `composer.json`

```json
"minimum-stability": "dev",
"prefer-stable": true
```
after you change  Add the package to your Laravel project via Composer:

```bash
composer require hawkiq/admlte
```

### Step 2: Publish Assets, Lang, and Configurations

Run the following Artisan command to publish the package's assets,language and configuration files:
```bash
php artisan admlte:install
```

This will:
- Copy AdminLTE assets (CSS, JS, images) to `public/vendor`.
- Publish the configuration file to `config/admlte.php`.
- Publish Languages files to `lang/` or `resources/lang/`.

### Step 3: Replace Auth Views ( Optional )

If you would like to use AdminLTE Auth views you can run below command to replace views:

```bash
php artisan admlte:install --only=auth_views
```
this step is safe since its taking backup in `storage` folder for current views so if anything wrong happened you can always restoring old views.

---

## Configuration

Customize the package by editing the configuration file located at:
```bash
config/admlte.php
```

Key configurations include:
- Sidebar links and permissions.
- Navbar components.
- Custom assets and scripts.

Example `config/admlte.php`:
```php
return [
    'sidebar' => [
        [
            'type' => 'header',
            'text' => 'main.navigation',
            'permission' => null,
        ],
        [
            'type' => 'link',
            'text' => 'Dashboard',
            'route' => 'test1',
            'icon' => 'fas fa-home',
            'permission' => null,
        ],
          [
            'type' => 'link',
            'text' => 'Test Link',
            'route' => 'test2',
            'icon' => 'fas fa-cog',
            'permission' => null,
        ],
    ],
];
```

---

## Usage

### Include the Layout
To use the package's layout, extend the base layout in your Blade files:

```blade
@extends('admlte::page')
```
want to include auth layout just use AdmLTE auth layouts:

#### for login page
```blade
@extends('admlte::auth.login')

```

#### for register page
```blade
@extends('admlte::auth.register')

```

### Customizing Views
If you need to customize views,
```bash
php artisan admlte::install --only=views
```
- Publish customizable views to `resources/views/vendor/admlte`.

---

## Contribution
Contributions are welcome! Feel free to fork the repository and submit a pull request.

---

## License
This package is open-sourced software licensed under the [MIT license](LICENSE).

