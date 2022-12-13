# Laravel Form-schema

This package creates a database schema to persist form, their fields, and their submissions.

## Installation

You can install the package via composer:

```bash
composer require designsensory/laravel-form-schema
```

You can publish migrations, the config, and service provider by installing:

```bash
php artisan form-schema:install
```

## Usage

Wip.

### Outline

```php
$form = Designsensory\FormSchema::createForm('Contact Us');

$field = Designsensory\FormSchema::addField($form, 'Full Name', 'text', ['required', 'placeholder' => 'Type your name']);

$field = Designsensory\FormSchema::addField($form, 'Email', 'email', ['required', 'placeholder' => 'Type your email']);

Designsensory\FormSchema::removeField($field);
```

```html
<x-formschema.form :form="$form"></x-formschema.form>
```

## Testing

Wip.

## Credits

- [Josh Vittetoe](https://github.com/jvittetoe)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
