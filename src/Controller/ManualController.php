<?php

namespace App\Controller;

use App\DTO\ProductReviewDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ManualController extends AbstractController
{
    #[Route('manual', methods: ['POST'])]
    public function example(Request $request, ValidatorInterface $validator): JsonResponse
    {
        // get data from the request
        $data = json_decode($request->getContent(), true);

        $comment = $data['comment'] ?? '';
        $rating = $data['rating'] ?? 0;

        // create dto 
        $dto = new ProductReviewDTO($comment, $rating);

        // validate it
        $errors = $validator->validate($dto);

        // throw bad request http exception in case we have errors
        if (count($errors) > 0) {
            throw new BadRequestHttpException((string) $errors);
        }

        // map dto back to json otherwise
        return new JsonResponse(
            [
                'comment' => $dto->comment,
                'rating'  => $dto->rating,
            ]
        );
    }
}
