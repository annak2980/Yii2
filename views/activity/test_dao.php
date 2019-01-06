<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.01.2019
 * Time: 22:17
 */
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class = "col-md-6">
        <?php foreach ($user_list as $user) : ?>
        <p>
            <strong>username: </strong><?=ArrayHelper::getValue($user,'username')?>
            <strong> email: </strong><?=ArrayHelper::getValue($user,'email')?>
        </p>
        <?php endforeach; ?>
        <br>
        <h3><div>Список всех мероприятий</div></h3>

        <?php foreach ($activities_reader as $activity_item) : ?>
            <p>
                <strong>Название:</strong><?=ArrayHelper::getValue($activity_item,'title')?>
                <strong>|дата начала:</strong><?=ArrayHelper::getValue($activity_item,'date_start')?>
                <strong>|описание:</strong><?=ArrayHelper::getValue($activity_item,'body')?>
                <strong>|user:</strong><?=ArrayHelper::getValue($activity_item,'user_id')?>
            </p>
        <?php endforeach; ?>

    </div>

    <div class = "col-md-6">

        <h3><div>Первое мероприятие для пользователя номер <?=$user_num?> </div></h3>
        <p><strong>Название: </strong><?=ArrayHelper::getValue($first_activity_user,'title')?></p>

        <h3><div>Всего в списке для пользователя номер <?=$user_num?>:  <br> <?=$count_activity_user?>  мероприятий</div></h3>

        <?php foreach ($activities_for_user as $activity_for_user) : ?>
            <p>
                <strong>Название: </strong><?=ArrayHelper::getValue($activity_for_user,'title')?>
                <strong>| дата начала: </strong><?=ArrayHelper::getValue($activity_for_user,'date_start')?>
                <strong>| описание: </strong><?=ArrayHelper::getValue($activity_for_user,'body')?>
            </p>
        <?php endforeach; ?>

        <h3><div>Перечень мероприятий с именами , email пользователей</div></h3>

        <?php foreach ($activities_one_day as $activity_one_day) : ?>
            <p>
                <strong>Номер в базе: </strong><?=ArrayHelper::getValue($activity_one_day,'id')?>
                <strong>Название: </strong><?=ArrayHelper::getValue($activity_one_day,'title')?>
                <strong>| дата начала: </strong><?=ArrayHelper::getValue($activity_one_day,'date_start')?>
                <br>
                <strong>| user: </strong><?=ArrayHelper::getValue($activity_one_day,'username')?>
                <strong>| email: </strong><?=ArrayHelper::getValue($activity_one_day,'email')?>
            </p>
        <?php endforeach; ?>

    </div>
</div>