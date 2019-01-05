<?php

use yii\db\Migration;

/**
 * Class m190104_093233_add_foreign_key
 */
class m190104_093233_add_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('activity_userFK','activity','user_id','users','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_093233_add_foreign_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190104_093233_add_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
