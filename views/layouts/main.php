<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],

            //            ['label' => 'пример вложенности в меню', 'items' =>[
//                ['label' => 'Праздники', 'items' =>[
//                        ['label'=> 'Новый год', 'url' => ['/events/newyear']],
//                        '<li class="divider"></li>',
//                        ['label'=> 'Рождество', 'url' => ['/events/cristmass']]
//                ]],
//                '<li class="divider"></li>',
//                ['label' => 'Мероприятия', 'items' =>[
//                    ['label' => 'Создать новое мероприятие', 'url' => ['/activity/create']],
//                    '<li class="divider"></li>',
//                    ['label' => 'Удалить мероприятие', 'url' => ['/activity/delete']]
//                ]],
//            ]],

            ['label' => 'Lesson 5 GeekBrains', 'items' =>[
                ['label' => 'Проверить работу с DAO (базой данных)', 'url' => ['/activity/test_dao']],
                '<li class="divider"></li>',
                ['label' => 'Посмотреть календарь событий', 'url' => ['/activity/event_calendar']],
                '<li class="divider"></li>',
                ['label' => 'Создать новое мероприятие', 'url' => ['/activity/new_activity']],
                '<li class="divider"></li>',
                ['label' => 'Создать новое событие(задание)', 'url' => ['/activity/new_event']],

            ]],

            Yii::$app->user->isGuest ? (
               // ['label' => 'Login', 'url' => ['/site/login']]
            ['label' => 'Login', 'url' => ['/users/sign-in']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right">Курс GeekBrains <?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
