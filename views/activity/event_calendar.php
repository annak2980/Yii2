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
        <h3><div>Календарь на 2019 год</div></h3>
        <?php foreach ($days_list as $day_item) : ?>
        <p>
            <strong>дата: </strong><?=substr(ArrayHelper::getValue($day_item,'calendar_data'),0,10)?>
            <strong> |выходной: </strong><?=(ArrayHelper::getValue($day_item,'is_weekend'))?'Да':'Нет'?>
            <strong> |праздник: </strong><?=(ArrayHelper::getValue($day_item,'is_holiday'))?'Да':'Нет'?>
        </p>
        <?php endforeach; ?>
        <br>
    </div>

    <div class = "col-md-6">
        <h3><div>События или задания на 2019 год </div></h3>
        <?php foreach ($events_list as $event_item) : ?>
            <p>
                <strong>дата: </strong><?=substr(ArrayHelper::getValue($event_item,'calendar_data'),0,10)?>
                <strong> |заголовок: </strong><?=ArrayHelper::getValue($event_item,'title')?>
                <strong> |номер мероприятия: </strong><?=(ArrayHelper::getValue($event_item,'activity_id'))?ArrayHelper::getValue($event_item,'activity_id'):'Не указан'?>
                <br>
                <strong> |описание: </strong><?=ArrayHelper::getValue($event_item,'body')?>
            </p>
        <?php endforeach; ?>
    </div>
</div>