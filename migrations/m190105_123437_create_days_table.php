<?php

use yii\db\Migration;

/**
 * Handles the creation of table `days`.
 */
class m190105_123437_create_days_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('days', [
            'id' => $this->primaryKey(),
            'calendar_data' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'is_weekend'=> $this->tinyInteger(1)->notNull()->defaultValue(0),
            'is_holiday'=> $this->tinyInteger(1)->notNull()->defaultValue(0),

            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('days');
    }
}
