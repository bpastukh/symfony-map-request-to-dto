<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ProductReviewDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 10, max: 50)]
        public readonly string $comment,
        
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(5)]
        public readonly int $rating,
    ) {
    }
}
