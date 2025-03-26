<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Data\Casts;

use Illuminate\Support\Str;
use PackageWizard\Installer\Enums\ValidationEnum;
use PackageWizard\Installer\Exceptions\ValidationRuleException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

use function collect;

class ValidationCast implements Cast
{
    protected ?array $rules = null;

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): array
    {
        foreach ($value as $rule) {
            $this->check($rule);
        }

        return $value;
    }

    protected function check(string $rule): void
    {
        if (ValidationEnum::tryFrom($rule) || Str::startsWith($rule, $this->rules())) {
            return;
        }

        throw new ValidationRuleException($rule);
    }

    protected function rules(): array
    {
        return $this->rules ??= collect(ValidationEnum::values())
            ->map(static fn (string $value) => $value . ':')
            ->all();
    }
}
