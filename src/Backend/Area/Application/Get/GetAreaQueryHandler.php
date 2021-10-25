<?php

namespace Nemuru\Backend\Area\Application\Get;

use Nemuru\Shared\Application\Bus\QueryHandler;

class GetAreaQueryHandler implements QueryHandler
{
    public function __construct(private GetAreaCalculate $calculate)
    {
    }

    public function __invoke(GetAreaQuery $query): array
    {
        return $this->calculate->__invoke($query);
    }
}