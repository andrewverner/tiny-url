<?php

declare(strict_types=1);

namespace app\services;

interface HashGeneratorServiceInterface
{
    public function generate(int $length = 5): string;
}
