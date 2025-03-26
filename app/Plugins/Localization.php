<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Plugins;

use DragonCode\Support\Facades\Filesystem\Path;
use LaravelLang\Lang\Plugins\Laravel\V11;

use function collect;

class Localization extends V11
{
    protected ?string $vendor = null;

    public function files(): array
    {
        return collect(parent::files())
            ->filter(static fn (string $to) => Path::filename($to) === 'validation')
            ->all();
    }
}
