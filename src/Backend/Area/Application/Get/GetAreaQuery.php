<?php
declare(strict_types=1);
namespace Nemuru\Backend\Area\Application\Get;
use Nemuru\Shared\Infrastructure\Bus\Query;

final class GetAreaQuery implements Query
{
    public function __construct(private string $uuid)
    {

    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}