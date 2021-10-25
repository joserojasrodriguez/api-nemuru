<?php
declare(strict_types=1);
namespace Nemuru\Backend\Area\Application\Get;

use Nemuru\Backend\Area\Domain\Area;
use Nemuru\Backend\Area\Domain\AreaRepository;

class GetAreaCalculate
{
    public Area $area;
    public function __construct(private AreaRepository $repository)
    {

    }

    public function __invoke(GetAreaQuery $query): array
    {
        $this->area =  $this->repository->searchByUuid($query->uuid());

        return $this->area->jsonSerialize();
    }
}