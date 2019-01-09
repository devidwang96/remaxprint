<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php include "admin_navbar.php"?>

<div class="container">
    <div class="article-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
