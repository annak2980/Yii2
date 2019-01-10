<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.01.2019
 * Time: 20:40
 */

namespace app\widgets\test_dao;

use yii\base\Widget;

class TestDaoWidget extends Widget
{
    public $user_list;

    public $activities_reader;

    public function init(){
        parent::init(); //после инициализации родительской ф-ции можно выполнить предварительные действия
                        //перед запуском виджета
    }

    public function run()
    {
        return $this->render('test_dao_widget',
            ['user_list'=>$this->user_list,
                'activities_reader'=>$this->activities_reader]);
    }
}