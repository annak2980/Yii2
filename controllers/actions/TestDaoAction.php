<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.01.2019
 * Time: 22:12
 */

namespace app\controllers\actions;


use yii\base\Action;

class TestDaoAction extends Action
{
    public function run()
   {
        $dao= \Yii::$app->dao;

        $user_list=$dao->getUsersList();

        $user_num = 1;

        $activities_for_user=$dao->getActivityUser($user_num);

        $first_activity_user=$dao->getFirstActivityUser($user_num);

        $count_activity_user=$dao->getCountActivityUser($user_num);

        $activities_reader = $dao->getQueryActivityUser();

        $activities_one_day = $dao->getActivityOneDay();

        return $this->controller->render('test_dao',
            [   'user_list'=>$user_list,
             'activities_for_user'=>$activities_for_user,
             'user_num'=>$user_num,
             'first_activity_user'=>$first_activity_user,
             'count_activity_user'=>$count_activity_user,
             'activities_reader'=>$activities_reader,
             'activities_one_day'=>$activities_one_day
            ]
        );
   }
}