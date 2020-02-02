<?php

namespace backend\modules\controllers;

use backend\modules\models\User;
use backend\modules\models\SignupForm;
use common\models\LoginForm;
use Yii;
use yii\rest\ActiveController;


class UserController extends ActiveController
{
    public $modelClass = 'backend\models\User';

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {

            $user = User::findOne(["username" => $model->username]);
            $user->generateAccessToken();
            $user->save();

            return ['access_token' => $user->access_token];
        }
        $model->validate();
        return $model;

    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->signup()) {

            $user = User::findOne(["username" => $model->username]);

            return ['access_token' => $user->access_token];
        } else {
            $model->validate();
            return $model;
        }
    }




}
