<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tiny_url}}`.
 */
class m241006_163531_create_tiny_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(
            table: '{{%tiny_url}}',
            columns: [
                'id' => $this->primaryKey(),
                'original_url' => $this->string()->notNull(),
                'hash' => $this->binary(length: 5)->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'expired_at' => $this->dateTime()->notNull(),
            ],
            options: 'charset=utf8',
        );
        $this->createIndex(name: 'tiny_url_hash_idx', table: '{{%tiny_url}}', columns: 'hash(5)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropIndex(name: 'tiny_url_hash_idx', table: '{{%tiny_url}}');
        $this->dropTable(table: '{{%tiny_url}}');
    }
}
