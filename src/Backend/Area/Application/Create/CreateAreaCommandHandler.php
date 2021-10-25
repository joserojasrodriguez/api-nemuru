<?php
declare(strict_types=1);
namespace Nemuru\Backend\Area\Application\Create;

use Nemuru\Backend\Area\Domain\AreaNumber;
use Nemuru\Backend\Area\Domain\AreaUuid;
use Nemuru\Shared\Application\Bus\CommandHandler;

class CreateAreaCommandHandler implements CommandHandler
{
    public function __construct(private AreaCreator $creator)
    {

    }

    public function __invoke(CreateAreaCommand $command):void
    {
        $id = new AreaUuid($command->id());
        $number = new AreaNumber($command->number());

        $this->creator->__invoke($id,$number);
    }

}