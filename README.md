# Envoyer Laravel

This library provides envoyer binding for laravel web framework.

## Usage

The library uses, composer extra configuration to automatically register a service provider that exposes commands to publish configuration for laravel framework.

- Config

To publish envoyer configuration run:

> php artisan vendor:publish --tag=envoyer

**Note** The above command will create a file with name `envoyer.php` in the `config` folder at the root of your project directory.