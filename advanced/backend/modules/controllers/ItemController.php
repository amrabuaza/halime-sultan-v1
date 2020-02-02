<?php

namespace backend\modules\controllers;

use backend\modules\models\item;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ItemController extends ActiveController
{
    public $modelClass = 'backend\modules\models\item';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];
        return $behaviors;
    }


    public function actionAmr()
    {
        return  Item::find()->with("itemSizes")->all();
    }

}