<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data;

use PackageWizard\Installer\Data\Casts\ArrayWrapCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class ReplaceData extends Data
{
    public ?string $id = null;

    #[WithCast(ArrayWrapCast::class)]
    public array $replace;

    public int|string $with;

    public bool $asked = false;
}
