<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\LoginForm;
use app\models\User;
use yii\helpers\Url;

class AuthController extends Controller
{
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

//        dd($model->load(Yii::$app->request->post()));
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->getResponse()->redirect(Url::to('/admin'), 302);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTest(){

        $user = User::findOne(1);
        Yii::$app->user->login($user);

        if(Yii::$app->user->isGuest){
            echo "Пользователь гость";
        } else {
            echo "Пользователь авторизирован";
        }
    }

}