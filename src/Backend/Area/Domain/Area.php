<?php
declare(strict_types=1);

namespace Nemuru\Backend\Area\Domain;

use AggregateRoot;
use Exception;

final class Area extends AggregateRoot
{

    private function __construct(
        private AreaUuid      $areaUuid,
        private AreaNumber    $areaNumber,
        private AreaCalculate $areaCalculate,
        private AreaWeather   $areaWeather
    )
    {
    }

    /**
     * @throws Exception
     */
    public static function create(AreaUuid $areaUuid, AreaNumber $areaNumber, AreaCalculate $areaCalculate,AreaWeather $areaWeather): self
    {
        $area = new self(
            $areaUuid,
            $areaNumber,
            $areaCalculate,
            $areaWeather
        );
        $area->record(new AreaCreatedDomainEvent($areaUuid->value(), $areaCalculate->value(), $areaWeather->value()));
        return $area;
    }



    public static function fromValueObjets(AreaUuid $areaUuid, AreaNumber $areaNumber, AreaWeather $areaWeather): self
    {
        return self::create(
            $areaUuid,
            $areaNumber,
            AreaCalculate::from(rand(0, 10) / 10),
            $areaWeather
        );
    }


    public function uuid(): AreaUuid
    {
        return $this->areaUuid;
    }

    public function number(): AreaNumber
    {
        return $this->areaNumber;
    }

    public function calculate(): AreaCalculate
    {
        return $this->areaCalculate;
    }

    public function weather(): AreaWeather
    {
        return $this->areaWeather;
    }

    public function jsonSerialize(): array
    {
        return [
            'uuid' => $this->uuid()->value(),
            'area' => $this->calculate()->value(),
            'weather' => $this->weather()->value(),
        ];
    }
}