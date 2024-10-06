<?php

declare(strict_types=1);

namespace app\services;

use app\exceptions\RuntimeDBException;
use app\models\TinyUrl;
use app\models\TinyUrlForm;
use app\repositories\TinyUrlRepositoryInterface;
use yii\db\Exception;
use yii\db\Expression;

final readonly class TinyUrlService implements TinyUrlServiceInterface
{
    public function __construct(
        private TinyUrlRepositoryInterface $tinyUrlRepository,
        private HashGeneratorServiceInterface $hashGenerator,
    ) {
    }

    /**
     * @throws Exception
     * @throws RuntimeDBException
     */
    public function create(TinyUrlForm $tinyUrlForm): TinyUrl
    {
        $model = $this->tinyUrlRepository->findByUrl(url: $tinyUrlForm->url);

        if ($model === null) {
            $model = new TinyUrl();
            $model->original_url = $tinyUrlForm->url;
            $model->hash = $this->hashGenerator->generate();
            $model->created_at = new Expression(expression: 'NOW()');
        }

        $model->expired_at = new Expression(expression: 'NOW() + INTERVAL 3 DAY');

        if (!$model->save()) {
            throw new RuntimeDBException(message: 'An error occurred while saving TinyUrl');
        }

        return $model;
    }
}
