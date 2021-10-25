<?php
namespace Nemuru\Backend\Area\Application\Create;

use GuzzleClientArea;
use Nemuru\Backend\Area\Domain\Area;
use Nemuru\Backend\Area\Domain\AreaNumber;
use Nemuru\Backend\Area\Domain\AreaRepository;
use Nemuru\Backend\Area\Domain\AreaUuid;
use Nemuru\Backend\Area\Domain\AreaWeather;
use Nemuru\Shared\Application\Bus\Event\EventBus;

class AreaCreator
{

	public function __construct(private AreaRepository $repository, private EventBus $bus, private GuzzleClientArea $client)
	{}

	public function __invoke(AreaUuid $areaUuid,AreaNumber $areaNumber):void
	{
		$weather = AreaWeather::from($this->getWeather());
		$area = Area::fromValueObjets($areaUuid,$areaNumber,$weather);

		$this->repository->save($area);
        $this->bus->publish(...$area->pullDomainEvents());
	}
	
	private function getWeather():string
	{
		$data = $this->client->getWeather();
		return json_encode($data);
	}
}