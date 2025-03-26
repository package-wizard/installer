<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

use function __;
use function blank;

class PlaceholderCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        if (blank($value)) {
            return '';
        }

        return __('form.eg', ['value' => $value]);
    }
}
