<?php
declare(strict_types=1);
namespace Nemuru\Shared\Domain;

use DateTimeInterface;

class Utils
{
	public static function dateToString(DateTimeInterface $date): string
	{
		return $date->format(DateTimeInterface::ATOM);
	}
}