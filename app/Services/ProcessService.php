<?php

declare(strict_types=1);

namespace PackageWizard\Installer\Services;

use Illuminate\Support\Arr;
use PackageWizard\Installer\Concerns\Console\HasOutput;
use PackageWizard\Installer\Support\Console;
use RuntimeException;
use Symfony\Component\Process\Process;

use function dirname;
use function file_exists;
use function implode;
use function is_array;
use function is_readable;
use function Laravel\Prompts\warning;
use function trim;

class ProcessService
{
    use HasOutput;

    public function runWithInteract(array|string $command, string $directory): void
    {
        $process = $this->process(
            $this->prepareCommand($command),
            $directory
        );

        $this->tty($process);

        if (Console::quiet()) {
            $process->disableOutput();
        }

        $process->run(
            fn ($type, $line) => static::output()->write('    ' . $line)
        );
    }

    public function runWithOutput(array|string $command): ?string
    {
        $process = new Process(Arr::wrap($command));

        $process->run();

        $output = trim($process->getOutput());

        return $process->isSuccessful() && $output ? $output : null;
    }

    protected function process(string $command, string $path): Process
    {
        $directory = is_file($path) ? dirname($path) : $path;

        return Process::fromShellCommandline($command, $directory, timeout: 300);
    }

    protected function tty(Process $process): void
    {
        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                warning($e->getMessage());
            }
        }
    }

    protected function prepareCommand(array|string $command): string
    {
        if (is_array($command)) {
            return implode(' && ', $command);
        }

        return $command;
    }
}
