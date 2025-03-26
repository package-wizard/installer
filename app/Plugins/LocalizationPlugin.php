<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Plugins;

use LaravelLang\Lang\Plugin as BasePlugin;

class LocalizationPlugin extends BasePlugin
{
    protected array $plugins = [
        Localization::class,
    ];
}
