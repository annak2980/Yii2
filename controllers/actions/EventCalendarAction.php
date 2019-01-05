<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.01.2019
 * Time: 22:12
 */

namespace app\controllers\actions;


use yii\base\Action;

class EventCalendarAction extends Action
{
    public function run()
   {
        $dao= \Yii::$app->dao_event;

        $days_list   = $dao->getDaysList();
        $events_list = $dao->getEventsCalendar();


        return $this->controller->render('event_calendar',
            [   'days_list'=>$days_list,
                'events_list'=>$events_list
            ]
        );
   }
}