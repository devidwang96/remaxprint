<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Remaxprint</title>

    <script src="/assets/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.css">

    <script src="/assets/bootstrap/js/bootstrap.js"></script>

    <link href="/css/app.css" rel="stylesheet">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap <?= Url::current() !== '/site/index' ? 'admin-wrap' : '' ?>">
    <?= $content ?>
</div>

<?php $this->endBody() ?>

<script src="/js/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/js/jqBootstrapValidation.js"></script>
<script src="/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="/js/agency.min.js"></script>


<script src="/assets/animjs/animjs.js"></script>


</body>
</html>
<?php $this->endPage() ?>
