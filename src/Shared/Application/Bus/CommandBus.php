<?php

declare(strict_types=1);

namespace Nemuru\Shared\Application\Bus;

interface CommandBus
{
    public function dispatch(...$commands): void;
}