<?php

use yii\db\Migration;

/**
 * Class m220622_033852_users
 */
class m220622_033852_users extends Migration
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
        echo "m220622_033852_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'isAdmin' => $this->boolean(),
            'login' => $this->string(300),
            'password' => $this->string(300),
            'firstName' => $this->string(300),
            'middleName' => $this->string(300),
            'lastName' => $this->string(300),
            'dateBirthday' => $this->date(),
            'about' => $this->string(1000),
            'photo' => $this->string(),
        ]);
    }

    public function down()
    {
        echo "m220622_033852_users cannot be reverted.\n";

        return false;
    }
}
