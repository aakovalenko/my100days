<?php

use yii\db\Migration;

/**
 * Class m180302_123532_add_role_to_user_table
 */
class m180302_123532_add_role_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn('user','role', $this->string('50')->defaultValue('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180302_123532_add_role_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180302_123532_add_role_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
