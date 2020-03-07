<?php

namespace backend\modules\controllers;

use backend\models\Country;
use yii\filters\Cors;
use yii\rest\ActiveController;

class CountryController extends ActiveController
{

    public $modelClass = 'backend\models\country';

    public function actions()
    {
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

        return $behaviors;
    }

    public function actionGetAll()
    {
        return Country::find()->all();
    }

}