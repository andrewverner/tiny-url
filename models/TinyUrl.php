<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "tiny_url".
 *
 * @property int $id
 * @property string $original_url
 * @property string $hash
 * @property string $created_at
 * @property string $expired_at
 */
final class TinyUrl extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'tiny_url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['original_url', 'hash', 'created_at', 'expired_at'], 'required'],
            [['created_at', 'expired_at'], 'safe'],
            [['original_url'], 'string', 'max' => 255],
            [['hash'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'original_url' => 'Original Url',
            'hash' => 'Hash',
            'created_at' => 'Created At',
            'expired_at' => 'Expired At',
        ];
    }
}
