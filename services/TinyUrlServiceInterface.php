<?php

declare(strict_types=1);

namespace app\services;

use app\models\TinyUrl;
use app\models\TinyUrlForm;

interface TinyUrlServiceInterface
{
    public function create(TinyUrlForm $tinyUrlForm): TinyUrl;
}
