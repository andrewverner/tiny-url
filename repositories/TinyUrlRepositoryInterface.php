<?php

declare(strict_types=1);

namespace app\repositories;

use app\models\TinyUrl;

interface TinyUrlRepositoryInterface
{
    public function findByUrl(string $url): ?TinyUrl;

    public function findByHash(string $hash): ?TinyUrl;

    public function isExists(string $hash): bool;
}
