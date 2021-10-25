<?php

namespace App\Controller;

use Nemuru\Backend\Area\Application\Create\CreateAreaCommand;
use Nemuru\Backend\Area\Application\Get\GetAreaQuery;
use Nemuru\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetAreaController extends ApiController
{
	#[Route('/get-area', methods: [Request::METHOD_POST])]
	public function __invoke(Request $request): JsonResponse
	{
        $payload = json_decode($request->getContent(), true);

        $getArea = new GetAreaQuery($payload);
        $response = $this->ask($getArea);

        return new JsonResponse(['data'=> $response], 200);

	}


}