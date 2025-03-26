<?php

declare(strict_types=1);

use PackageWizard\Installer\Enums\TypeEnum;

return [
    'schema' => 'https://package-wizard.com/schemas/schema-v2.json',

    'filename' => 'wizard.json',

    'default' => [
        'variables' => [
            [
                'type'    => TypeEnum::Year,
                'replace' => [':year:'],
            ],
        ],

        'questions' => [
            [
                'type' => TypeEnum::License,
            ],
        ],
    ],
];
