<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'История', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="history-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Обновить', ['Обновить', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Загрузить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
            <?= Html::a('Удалить', ['Удалить', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Удалить этот пункт истории?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'year',
                'title',
                'teaser',
                'photo',
            ],
        ]) ?>

        <img class="post-image" src="/uploads/<?= $model->photo; ?>" alt="">

    </div>

</div>

<style>
    img.post-image{
        width:600px;
        max-width:100%;
        padding:15px;
        border:1px solid rgba(0,0,0,0.3);
    }
</style>
