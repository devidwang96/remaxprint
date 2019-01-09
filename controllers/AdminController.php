<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class AdminController extends Controller
{
    public function actionIndex()
    {
        // If Admin

        Yii::$app->getResponse()->redirect(Url::to('/admin/command'), 302);
    }
}
