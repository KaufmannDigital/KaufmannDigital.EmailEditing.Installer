# KaufmannDigital Email Editing Installer

Composer plugin that automatically runs `npm install` for the [`spatie/mjml-php`](https://github.com/spatie/mjml-php) dependency after a Composer install or update.

This package is a companion to [kaufmanndigital/email-editing](https://github.com/KaufmannDigital/KaufmannDigital.EmailEditing) and is automatically required by it — you don't need to install it manually.

## Why does this exist?

`spatie/mjml-php` ships without its Node dependencies pre-installed and requires an `npm install` to be run in its package directory. This plugin ensures that step happens automatically as part of `composer install` / `composer update`, without any manual deployment steps.
