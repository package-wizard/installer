<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

use function __;
use function filled;
use function is_numeric;

class TranslatableCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        if (! is_numeric($value) && filled($value)) {
            return __($value);
        }

        return (string) $value;
    }
}
