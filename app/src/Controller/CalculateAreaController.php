<?php

namespace App\Controller;

use Nemuru\Backend\Area\Application\Create\CreateAreaCommand;
use Nemuru\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculateAreaController extends ApiController
{
	#[Route('/calculate-area', methods: [Request::METHOD_POST])]
	public function __invoke(Request $request): JsonResponse
	{
		$payload = json_decode($request->getContent(), true);

        $this->dispatch(new CreateAreaCommand(
            $payload['uuid'],
            $payload['number']
        )
        );

		$response = new JsonResponse();
		$response->setStatusCode(Response::HTTP_NO_CONTENT);
		return $response;

	}


}