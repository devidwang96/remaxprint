<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = 'Создать элемент портфолио';
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php include "admin_navbar.php"?>


<div class="container">
    <div class="portfolio-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>

