<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Basic */

$this->title = 'Создать текст';
$this->params['breadcrumbs'][] = ['label' => 'Текста', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php include "admin_navbar.php"?>


<div class="container">
    <div class="basic-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

