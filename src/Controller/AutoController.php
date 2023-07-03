<?php

namespace App\Controller;

use App\DTO\ProductReviewDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

class AutoController extends AbstractController
{
    #[Route('auto', methods: ['POST'])]
    public function example(
        #[MapRequestPayload()] ProductReviewDTO $dto
    ): JsonResponse
    {
        return new JsonResponse(
            [
                'comment' => $dto->comment,
                'rating'  => $dto->rating,
            ]
        );
    }
}
