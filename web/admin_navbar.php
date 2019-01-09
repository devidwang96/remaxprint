<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

NavBar::begin([
    'brandLabel' => Yii::t('app', 'На сайт'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$navItems=[
    ['label' =>  Yii::t('app', 'Команда'), 'url' => ['/admin/command']],
    ['label' => Yii::t('app','Контакты'), 'url' => ['/admin/contacts']],
    ['label' => Yii::t('app','Услуги'), 'url' => ['/admin/services']],
    ['label' => Yii::t('app','История'), 'url' => ['/admin/history']],
    ['label' => Yii::t('app','Портфолио'), 'url' => ['/admin/portfolio']],
    ['label' => Yii::t('app','Текста'), 'url' => ['/admin/basic']]
];
if (Yii::$app->user->isGuest) {
    array_push($navItems,['label' => Yii::t('app','Войти'), 'url' => ['/auth/login']]);
} else {
    array_push($navItems,['label' => Yii::t('app','Выйти').' (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
    );
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $navItems,
]);
NavBar::end();