# Package Wizard

![package wizard](https://preview.dragon-code.pro/the%20dragon%20code/package%20wizard.svg)

[![Stable Version][badge_stable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

> [!TIP]
>
> **Package Wizard** is a library for easy creation and customization of new projects with
> a CLI tool using ready-made templates.

## Installation

To get the latest version of `Package Wizard`, simply require the project using [Composer](https://getcomposer.org):

```bash
composer global require package-wizard/installer:*
```

## Basic Usage

Once in the folder, call the `paw` console command and follow the prompts.

The wizard will ask some questions and generate initial files for your project.

```bash
paw
```

### Most Popular Commands

```bash
paw package-wizard/laravel
paw package-wizard/writerside
paw package-wizard/console
paw package-wizard/composer

paw moonshine/app

paw laravel/laravel
paw laravel/livewire-starter-kit
paw laravel/vue-starter-kit
paw laravel/react-starter-kit
```

## Documentation

See the [documentation](https://package-wizard.com) for detailed installation instructions.

## Troubleshooting

For detailed information while the application is running, run it with the `-vvv` parameter:

```bash
paw -vvv
```

## License

The `Package Wizard` is licensed under the [MIT License](LICENSE).


[badge_downloads]:      https://img.shields.io/packagist/dt/package-wizard/installer.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/package-wizard/installer.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/package-wizard/installer?label=stable&style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/package-wizard/installer
