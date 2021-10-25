<?php
declare(strict_types=1);

namespace Nemuru\Backend\Area\Application\Create;

use Nemuru\Shared\Infrastructure\Bus\Command;

final class CreateAreaCommand implements Command
{
    public function __construct(private string $id, private int $number)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function number(): int
    {
        return $this->number;
    }
}