<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Command */

$this->title = 'Обновление сотрудника: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудник', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="command-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

