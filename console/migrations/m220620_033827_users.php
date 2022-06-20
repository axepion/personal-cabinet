<?php

use yii\db\Migration;

/**
 * Class m220620_033827_users
 */
class m220620_033827_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220620_033827_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(300),
            'password' => $this->string(300),
        ]);

    }
    /*
    public function down()
    {
        echo "m220620_033827_users cannot be reverted.\n";

        return false;
    }
    */
}
