# Hawkiq AdmLTE Package

Hawkiq AdmLTE is a Laravel package designed for seamless integration of the AdminLTE v4 beta template, providing a robust foundation for admin dashboards. This package simplifies the installation, configuration, and usage of AdminLTE with Bootstrap 5 and related components.

---

## Installation

Follow these steps to install and set up the Hawkiq AdmLTE package:

### Step 1: Require the Package

Add the package to your Laravel project via Composer:
```bash
composer require hawkiq/admlte
```


### Step 2: Publish Assets, Views, and Configurations

Run the following Artisan command to publish the package's assets, views, and configuration files:
```bash
php artisan vendor:publish --provider="Hawkiq\AdmLTE\AdmLTEServiceProvider"
```

This will:
- Copy AdminLTE assets (CSS, JS, images) to `public/vendor`.
- Publish customizable views to `resources/views/vendor/admlte`.
- Publish the configuration file to `config/admlte.php`.

### Step 3: Install Required Assets

Ensure the required frontend dependencies are installed:

#### Install Bootstrap and jQuery via NPM
```bash
npm install
```

#### Or use the included assets
Run the custom install command to copy AdminLTE, Bootstrap, and jQuery assets to the public directory:
```bash
php artisan admlte:install
```

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
            'text' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'active' => true,
            'submenu' => [],
            'permission' => 'view-dashboard',
        ],
        [
            'text' => 'Users',
            'route' => 'users.index',
            'icon' => 'fas fa-users',
            'permission' => 'manage-users',
        ],
    ],
];
```

---

## Usage

### Include the Layout
To use the package's layout, extend the base layout in your Blade files:

```blade
@extends('admlte::layouts.master')
```

### Add Sidebar and Navbar Components
comming soon

### Customizing Views
If you need to customize views, edit the published files located in:
```bash
resources/views/vendor/admlte
```


---

## Contribution
Contributions are welcome! Feel free to fork the repository and submit a pull request.

---

## License
This package is open-sourced software licensed under the [MIT license](LICENSE).

