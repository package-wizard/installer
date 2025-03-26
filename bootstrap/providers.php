<?php

declare(strict_types=1);

use Illuminate\Translation\TranslationServiceProvider;
use LaravelLang\Config\ServiceProvider as LocalesConfigServiceProvider;
use LaravelLang\Lang\ServiceProvider as LangServiceProvider;
use LaravelLang\Locales\ServiceProvider as LocalesServiceProvider;
use LaravelLang\Publisher\ServiceProvider as PublisherServiceProvider;
use PackageWizard\Installer\Plugins\LocalizationPlugin;
use PackageWizard\Installer\Providers\AppServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

return [
    AppServiceProvider::class,
    LaravelDataServiceProvider::class,
    TranslationServiceProvider::class,
    LangServiceProvider::class,
    LocalesConfigServiceProvider::class,
    LocalesServiceProvider::class,
    PublisherServiceProvider::class,
    LocalizationPlugin::class,
];
