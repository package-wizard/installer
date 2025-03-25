<?php

declare(strict_types=1);

return [
    'question' => [
        'name'  => 'What is your name?',
        'email' => 'What is your email?',

        'license' => 'Which is license will be distributed?',

        'app_name'        => 'Which is project name?',
        'app_description' => 'Which is project description?',

        'template' => 'Which template do you want to use?',

        'folder'   => 'In which folder do you want to place?',
        'location' => 'In which folder is the project located?',
    ],

    'hint' => [
        'enter' => 'Press Enter to continue if you want to leave the field blank',
    ],

    'eg' => [
        'package' => 'E.g. monolog/monolog',

        'relative_path' => 'E.g. ./blog',
        'absolute_path' => 'E.g. /var/www/blog',

        'folder' => 'blog',
    ],
];
