<?php

use yii\db\Migration;

/**
 * Class m190105_152456_add_events_data
 */
class m190105_152456_add_events_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $my_day = 01;
        $my_month = 01;
        $my_year = 2019;

        $my_date = mktime(0, 0, 0, $my_month , $my_day, $my_year);

        for ($i=1;$i<500;$i++){
            $this->insert('events',[
                'day_id' => random_int(2,364),
                'activity_id' => (($i%2)?random_int(1,59):''),

                'title'=> (($i%2)?'Событие '.$i:'Задание '.$i),
                'body'=> 'Здесь должно быть подробное описание события или задания '.$i,

                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190105_152456_add_events_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190105_152456_add_events_data cannot be reverted.\n";

        return false;
    }
    */
}
