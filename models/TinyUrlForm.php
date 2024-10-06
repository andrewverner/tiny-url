<?php

declare(strict_types=1);

namespace app\models;

use yii\base\Model;

final class TinyUrlForm extends Model
{
    public string $url = '';

    public function rules(): array
    {
        return [
            ['url', 'required'],
            ['url', 'url'],
            ['url', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'url' => 'URL',
        ];
    }
}
