<?php
declare(strict_types=1);

namespace Nemuru\Shared\Application\Bus\Event;

interface DomainEventSubscriber
{
	public static function subscribedTo(): array;
}