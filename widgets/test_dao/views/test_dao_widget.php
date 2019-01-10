<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.01.2019
 * Time: 20:51
 */
use yii\helpers\ArrayHelper;
?>
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
