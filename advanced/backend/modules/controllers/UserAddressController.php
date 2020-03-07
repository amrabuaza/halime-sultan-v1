<?php

namespace backend\modules\controllers;

use backend\models\UserAddress;
use backend\modules\models\ApiHelper;
use backend\modules\models\UserModels\User;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class UserAddressController extends ActiveController
{

    public $modelClass = 'backend\models\UserAddress';

    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['view']);
        unset($actions['delete']);
        return $actions;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options'],
        ];

        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'add' => ['POST'],
                'user-addresses' => ['GET'],
            ]
        ];

        return $behaviors;
    }

    public function actionAdd()
    {
        $model = new UserAddress();
        $user = ApiHelper::getUserFromRequest(Yii::$app->request);
        $model->user_id = $user->id;
        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return $model;
        } else {
            $model->validate();
            return $model;
        }
    }

    public function actionUserAddresses()
    {
        $model = new UserAddress();
        $user = ApiHelper::getUserFromRequest(Yii::$app->request);
        return UserAddress::find()->where(["user_id" => $user->id])->all();
    }


}