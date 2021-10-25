<?php
namespace Nemuru\Backend\Area\Infrastructure\Persistencie;


use Nemuru\Backend\Area\Domain\Area;
use Nemuru\Backend\Area\Domain\AreaRepository;
use Nemuru\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;


class MySqlAreaRepository extends DoctrineRepository implements AreaRepository
{

	public function save(Area $area): void
	{
		$this->persist($area);
	}

	public function searchByUuid(string $uuid): ?Area
	{
		$this->repository(Area::class)->findOneBy(['uuid' => $uuid]);
	}
}