<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchCommand */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Команда';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="command-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'position',
                'insta',
                'fb',
                //'tw',
                //'vk',
                //'photo',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

