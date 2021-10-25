<?php
declare(strict_types=1);


use Nemuru\Shared\Application\Bus\Event\DomainEvent;

class AggregateRoot
{
	private array $domainEvents = [];

	final public function pullDomainEvents(): array
	{
		$domainEvents       = $this->domainEvents;
		$this->domainEvents = [];

		return $domainEvents;
	}

	final protected function record(DomainEvent $domainEvent): void
	{
		$this->domainEvents[] = $domainEvent;
	}
}