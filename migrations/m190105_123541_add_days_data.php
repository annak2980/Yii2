<?php

use yii\db\Migration;

/**
 * Class m190105_123541_add_days_data
 */
class m190105_123541_add_days_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $holiday_array = [1,2,3,4,5,6,7,53,60,123]; //порядковый номер госуд.праздника в году

        $my_day = 01;
        $my_month = 01;
        $my_year = 2019;

        $my_date = mktime(0, 0, 0, $my_month , $my_day, $my_year);

        for ($i=0;$i<365;$i++){
            $this->insert('days',[
                'calendar_data' => date('Y-m-d H:i:s',$my_date+3600*24*$i),
                'is_weekend' => (date("w",$my_date+3600*24*$i)?0:1), //номер воскресенья равен 0
                'is_holiday' => ((in_array($i,$holiday_array))?1:0),

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
        echo "m190105_123541_add_days_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190105_123541_add_days_data cannot be reverted.\n";

        return false;
    }
    */
}
