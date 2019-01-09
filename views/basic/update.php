<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Basic */

$this->title = 'Обновить текст: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php include "admin_navbar.php"?>

<div class="container">

    <div class="basic-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>

