# KaufmannDigital Email Editing Installer

Composer plugin that automatically runs `npm install` for the [`spatie/mjml-php`](https://github.com/spatie/mjml-php) dependency after a Composer install or update.

This package is a companion to [kaufmanndigital/email-editing](https://github.com/KaufmannDigital/KaufmannDigital.EmailEditing). It requires `spatie/mjml-php` itself, so it is the only package needed to render MJML locally with Node.js:

```bash
composer config allow-plugins.kaufmanndigital/email-editing-installer true
composer require kaufmanndigital/email-editing-installer
```

Not needed if EmailEditing renders MJML via an API (`mjmlRendering.converter.mode: 'api'`).

## Versions

| Installer | spatie/mjml-php | MJML | EmailEditing |
|-----------|-----------------|------|--------------|
| 2.x       | ^1.3 (required) | 5    | ^4.0         |
| 1.x       | -               | 4    | 2.x, 3.x     |

## Why does this exist?

`spatie/mjml-php` ships without its Node dependencies pre-installed and requires an `npm install` to be run in its package directory. This plugin ensures that step happens automatically as part of `composer install` / `composer update`, without any manual deployment steps.
