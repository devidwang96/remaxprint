<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Command */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Commands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="command-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Загрузить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Уволили что ли бедолагу?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'position',
                'insta',
                'fb',
                'tw',
                'vk',
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

