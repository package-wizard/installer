<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Helpers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as BaseValidator;
use PackageWizard\Installer\Enums\ValidationEnum;

use function blank;
use function in_array;

class ValidationHelper
{
    public static function validated(string $value, array $rules): ?string
    {
        if (blank($value) && static::hasSometimes($rules)) {
            return null;
        }

        $validator = static::validator($value, $rules);

        if ($validator->failed()) {
            return $validator->errors()->first();
        }

        return null;
    }

    protected static function hasSometimes(array $rules): bool
    {
        return in_array(ValidationEnum::Sometimes->value, $rules, true);
    }

    protected static function validator(string $value, array $rules): BaseValidator
    {
        return Validator::make(
            ['value' => $value],
            ['value' => $rules]
        );
    }
}
