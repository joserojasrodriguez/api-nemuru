<?php

declare(strict_types=1);

namespace Nemuru\Shared\Domain\ValueObject;

interface ValueObject extends \JsonSerializable
{
    public function equalTo(object $other): bool;
}
