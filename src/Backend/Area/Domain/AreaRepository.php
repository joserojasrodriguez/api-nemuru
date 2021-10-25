<?php

namespace Nemuru\Backend\Area\Domain;

interface AreaRepository
{
	public function save(Area $area): void;

	public function searchByUuid(string $uuid): ?Area;
}