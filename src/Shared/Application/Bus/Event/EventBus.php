<?php
declare(strict_types=1);

namespace Nemuru\Shared\Application\Bus\Event;

interface EventBus
{
	public function publish(DomainEvent ...$events): void;
}