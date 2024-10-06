<?php

declare(strict_types=1);

namespace app\repositories;

use app\models\TinyUrl;
use yii\db\Expression;

final class TinyUrlRepository implements TinyUrlRepositoryInterface
{
    public function findByUrl(string $url): ?TinyUrl
    {
        return TinyUrl::findOne(['original_url' => $url]);
    }

    public function findByHash(string $hash): ?TinyUrl
    {
        return TinyUrl::find()
            ->where(['hash' => $hash])
            ->andWhere(['>=', 'expired_at', new Expression(expression: 'NOW()')])
            ->one();
    }

    public function isExists(string $hash): bool
    {
        return TinyUrl::find()
            ->where(['hash' => $hash])
            ->andWhere(['>=', 'expired_at', new Expression(expression: 'NOW()')])
            ->exists();
    }
}
