<?php

use yii\db\Migration;

/**
 * Handles the creation of table `events`.
 */
class m190105_145746_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'day_id' => $this->integer()->notNull()->defaultValue(2),
            'activity_id' => $this->integer(),
            'title'=> $this->string(255)->notNull(),
            'body'=> $this->text()->notNull(),

            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('events');
    }
}
