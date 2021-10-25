<?php

declare(strict_types=1);

namespace Nemuru\Shared\Infrastructure;

use Exception;
use Nemuru\Shared\Application\Bus\CommandBus;
use Nemuru\Shared\Application\Bus\QueryBus;
use Nemuru\Shared\Infrastructure\Bus\Query;
use Nemuru\Shared\Infrastructure\Bus\Command;
use Ramsey\Uuid\Uuid;


abstract class ApiController
{
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
        public JsonApiResponseFactory $response
    ) {

    }

    protected function ask(Query $query): mixed
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): mixed
    {
        $this->commandBus->dispatch($command);
    }

    /**
     * @throws Exception
     */
    protected function generateUuid(): string
    {
        return UUid::uuid4()->toString();
    }

}
