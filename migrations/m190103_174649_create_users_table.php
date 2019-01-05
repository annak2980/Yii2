<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190103_174649_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(150)->notNull(),
            'password' => $this->string(300)->notNull(),
            'auth_key' => $this->string(300),
            'email' => $this->string(150),
            'status' => $this->Integer(1)->notNull()->defaultValue(0),
            'create_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
