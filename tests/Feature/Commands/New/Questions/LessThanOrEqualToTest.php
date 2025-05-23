<?php

declare(strict_types=1);

use PackageWizard\Installer\Commands\NewCommand;

use function PHPUnit\Framework\assertFileDoesNotExist;

afterEach(
    fn () => assertFileDoesNotExist(temp_path('wizard.json'))
);

it('conditions', function () {
    prepare_project('questions-LessThanOrEqualTo');

    artisan(NewCommand::class)
        ->expectsQuestion('Target question', '500')
        ->doesntExpectOutputToContain('Some question #1')
        ->expectsQuestion('Some question #2', 'a2')
        ->expectsQuestion('Some question #3', 'a3')
        ->expectsConfirmation(__('info.accept'), 'yes')
        ->assertSuccessful();
});
