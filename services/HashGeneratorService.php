<?php

declare(strict_types=1);

namespace app\services;

use app\repositories\TinyUrlRepositoryInterface;

final class HashGeneratorService implements HashGeneratorServiceInterface
{
    private string $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_';

    public function __construct(
        private readonly TinyUrlRepositoryInterface $tinyUrlRepository,
    ) {
    }

    public function generate(int $length = 5): string
    {
        $hash = $this->generateHash(length: $length);

        while ($this->tinyUrlRepository->isExists(hash: $hash)) {
            $hash = $this->generateHash(length: $length);
        }

        return $hash;
    }

    private function generateHash(int $length = 5): string
    {
        return substr(
            string: str_shuffle(string: $this->alphabet),
            offset: mt_rand(min: 0, max: strlen(string: $this->alphabet) - 6),
            length: $length,
        );
    }
}
