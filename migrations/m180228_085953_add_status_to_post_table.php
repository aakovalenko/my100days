<?php

use yii\db\Migration;

/**
 * Class m180228_085953_add_status_to_post_table
 */
class m180228_085953_add_status_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'url', $this->string(150));
        $this->addColumn('posts', 'status_id', $this->integer());
        $this->addColumn('posts', 'sort', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180228_085953_add_status_to_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180228_085953_add_status_to_post_table cannot be reverted.\n";

        return false;
    }
    */
}
