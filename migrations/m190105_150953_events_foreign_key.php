<?php

use yii\db\Migration;

/**
 * Class m190105_150953_events_foreign_key
 */
class m190105_150953_events_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addForeignKey('events_daysFK','events','day_id','days','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190105_150953_events_foreign_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190105_150953_events_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
