<?php

use yii\db\Migration;

/**
 * Class m190104_103404_add_activity_data
 */
class m190104_103404_add_activity_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->batchInsert('activity',['title','date_start','body','user_id'],
        //['Заголовок 1','2018-12-24 20:00:00','Lesson',1]);

        for ($i=1;$i<60;$i++){
            $this->insert('activity',[
                'id'=>$i,
                'title'=>'Title '.$i,
                'date_start'=>'2019-01-10 20:00:00',
                'body'=>'Lesson '.$i,
                'user_id'=>(($i%2)?1:2)
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_103404_add_activity_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190104_103404_add_activity_data cannot be reverted.\n";

        return false;
    }
    */
}
