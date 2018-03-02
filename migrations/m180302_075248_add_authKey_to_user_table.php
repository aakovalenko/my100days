<?php

use yii\db\Migration;

/**
 * Class m180302_075248_add_authKey_to_user_table
 */
class m180302_075248_add_authKey_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'authKey', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180302_075248_add_authKey_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180302_075248_add_authKey_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
