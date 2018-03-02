<?php

use yii\db\Migration;

/**
 * Class m180302_100407_add_author_to
 */
class m180302_100407_add_author_to extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'author_id', $this->integer(50)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180302_100407_add_author_to cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180302_100407_add_author_to cannot be reverted.\n";

        return false;
    }
    */
}
