<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 07.01.2019
 * Time: 11:42
 */

namespace app\controllers;


use app\rbac\AuthorActivityRule;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGen(){
        //нужно создать permission  и раздать его по ролям пользователей
        $authManager=\Yii::$app->authManager;
        $authManager->removeAll();

        $admin=$authManager->createRole('admin');
        $user=$authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $authorActivityRule=new AuthorActivityRule();
        $authManager->add($authorActivityRule);

        $authorActivityPermission=$authManager->createPermission('authorActivity');
        $authorActivityPermission->description='Владелец записи';
        $authorActivityPermission->ruleName=$authorActivityRule->name;
        $authManager->add($authorActivityPermission);

        ////////////////////Activity - действия с мероприятиями
        $createActivity=$authManager->createPermission('createActivity');
        $createActivity->description='Создание мероприятия';

        $viewActivity=$authManager->createPermission('viewActivity');
        $viewActivity->description='Просмотр мероприятия';

        $editActivity=$authManager->createPermission('editActivity');
        $editActivity->description='Редактирование мероприятия';

        $authManager->add($createActivity);
        $authManager->add($viewActivity);
        $authManager->add($editActivity);

        ////////////////////Event - действия с событиями(заданиями)
        $createEvent=$authManager->createPermission('createEvent');
        $createEvent->description='Создание события';

        $viewEvent=$authManager->createPermission('viewEvent');
        $viewEvent->description='Просмотр события';

        $editEvent=$authManager->createPermission('editEvent');
        $editEvent->description='Редактирование события';

        $authManager->add($createEvent);
        $authManager->add($viewEvent);
        $authManager->add($editEvent);

        //предоставляем право конкретному виду пользователя (роли)

        $authManager->addChild($user,$createActivity);
        $authManager->addChild($admin,$viewActivity);
        $authManager->addChild($admin,$editActivity);

        $authManager->addChild($user,$createEvent);
        $authManager->addChild($admin,$viewEvent);
        $authManager->addChild($admin,$editEvent);

        $authManager->addChild($user,$authorActivityPermission); //только автор может просматривать свои мероприятия
        $authManager->addChild($admin,$user);

        //указываем роль для конкретного пользователя из таблицы бд users

        $authManager->assign($admin,3);
        $authManager->assign($user,4);

        //добавить права для Event
    }
}