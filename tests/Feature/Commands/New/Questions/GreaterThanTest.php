<?php

declare(strict_types=1);

use PackageWizard\Installer\Commands\NewCommand;

use function PHPUnit\Framework\assertFileDoesNotExist;

afterEach(
    fn () => assertFileDoesNotExist(temp_path('wizard.json'))
);

it('conditions', function () {
    prepare_project('questions-GreaterThan');

    artisan(NewCommand::class)
        ->expectsQuestion('Target question', '500')
        ->expectsQuestion('Some question #1', 'a1')
        ->doesntExpectOutputToContain('Some question #2')
        ->doesntExpectOutputToContain('Some question #3')
        ->expectsConfirmation(__('info.accept'), 'yes')
        ->assertSuccessful();
});
