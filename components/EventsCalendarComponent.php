<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.01.2019
 * Time: 22:06
 */

namespace app\components;

use yii\base\Component;
use yii\db\Query;


class EventsCalendarComponent extends Component

{
     public $db_component_name;

     public function getDaysList(){
        $db=$this->getConnection();
        return $db->createCommand('select * from days')->queryAll();
     }


     public function getEventsCalendar(){ //пример использования построителя запросов
         $query=new Query();
         $query->select(['body','title','calendar_data','activity_id'])
             ->from('events')
             ->join('inner join','days','events.day_id=days.id')
             ->orderBy(['calendar_data'=>SORTDATE]);

         return $query->all();
     }

    public function getConnection(){
         return \Yii::$app->{$this->db_component_name};
     }
}