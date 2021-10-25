<?php

namespace Nemuru\Backend\Area\Domain;

use JetBrains\PhpStorm\ArrayShape;
use Nemuru\Shared\Application\Bus\Event\DomainEvent;

class AreaCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string         $id,
        private float  $area,
        private string $weather,
        string         $eventId = null,
        string         $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'area.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array  $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent
    {
        return new self($aggregateId, $body['area'], $body['weather'], $eventId, $occurredOn);
    }


    #[ArrayShape(['area' => "float", 'weather' => "string"])]
    public function toPrimitives(): array
    {
        return [
            'area' => $this->area,
            'weather' => $this->weather
        ];
    }

    public function area(): string
    {
        return $this->area;
    }

    public function weather(): string
    {
        return $this->weather;
    }
}