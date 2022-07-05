<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderController
{
    #[Route(path: '/{userId}', name: 'users_list', methods: [Request::METHOD_GET])]
    public function listAction(string $userId, OrderRepository $orderRepository): JsonResponse
    {
        $data = $orderRepository->findByUserId($userId);

        return new JsonResponse($data);
    }
}
