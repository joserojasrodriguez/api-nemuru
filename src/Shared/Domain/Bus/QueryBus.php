<?php

declare(strict_types=1);

namespace Nemuru\Shared\Application\Bus;

interface QueryBus
{
    public function ask($query);
}
