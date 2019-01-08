<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity`.
 */
class m190101_192514_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey()
        ]);


    }
//
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }
}
