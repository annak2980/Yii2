<?php

use yii\db\Migration;

/**
 * Class m190107_164113_add_events_column
 */
class m190107_164113_add_events_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('events','user_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190107_164113_add_events_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190107_164113_add_events_column cannot be reverted.\n";

        return false;
    }
    */
}
