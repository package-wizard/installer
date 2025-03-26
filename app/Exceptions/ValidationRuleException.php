<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Exceptions;

use Exception;

class ValidationRuleException extends Exception
{
    public function __construct(string $rule)
    {
        parent::__construct("Unknown validation rule: $rule");
    }
}
