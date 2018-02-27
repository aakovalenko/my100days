<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180227_144053_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'text' => $this->text(),
            'picture' => $this->string(),
            'date_create' => $this->string(),
            'date_update' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('posts');
    }
}
