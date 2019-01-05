<?php

use yii\db\Migration;

/**
 * Class m190104_090629_add_activity_colums
 */
class m190104_090629_add_activity_colums extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','title', $this->string(255)->notNull());
        $this->addColumn('activity','date_start', $this->timestamp()->defaultExpression("now()"));
        $this->addColumn('activity','date_end', $this->timestamp()->defaultExpression("now()"));
        $this->addColumn('activity','user_id', $this->integer());
        $this->addColumn('activity','body', $this->text());
        $this->addColumn('activity','address', $this->string(1000));
        $this->addColumn('activity','is_repeat', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('activity','is_block',  $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('activity','create_at', $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'));
        $this->addColumn('activity','update_at', $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_090629_add_activity_colums cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190104_090629_add_activity_colums cannot be reverted.\n";

        return false;
    }
    */
}
