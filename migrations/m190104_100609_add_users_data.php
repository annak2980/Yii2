<?php

use yii\db\Migration;

/**
 * Class m190104_100609_add_users_data
 */
class m190104_100609_add_users_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id'=>1,
            'username'=>'admin',
            'email'=>'admin@mail.ru',
            'password'=>'12345'
        ]);
        $this->insert('users',[
            'id'=>2,
            'username'=>'guest',
            'email'=>'guest@mail.ru',
            'password'=>'12345'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_100609_add_users_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190104_100609_add_users_data cannot be reverted.\n";

        return false;
    }
    */
}
