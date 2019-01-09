<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Command */

$this->title = 'Создать сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Команда', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="command-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

