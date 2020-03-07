<?php

namespace backend\modules\controllers;

use backend\modules\models\ApiHelper;
use backend\modules\models\UserModels\ChangePassword;
use backend\modules\models\UserModels\ChangePhoneNumber;
use backend\modules\models\UserModels\ProfilePicture;
use backend\modules\models\UserModels\UserProfile;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class UserController extends ActiveController
{
    public $modelClass = 'backend\models\User';

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
                'Access-Control-Request-Method' => ['POST', 'GET', 'PATCH', 'PUT'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'send-code'],
        ];

        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'login' => ['POST'],
                'signup' => ['POST'],
                'get-login-user' => ['GET'],
                'update-user' => ['PUT'],
                'change-password' => ['PATCH'],
                'upload-profile-picture' => ['POST'],
                'change-phone-number' => ['PATCH']
            ]
        ];

        return $behaviors;
    }


    public function actionGetLoginUser()
    {
        return UserProfile::getUserByAccessToken(ApiHelper::getAccessTokenFromHeaders(Yii::$app->request));
    }

    public function actionUpdateUser()
    {
        $model = new UserProfile();
        $model->access_token = ApiHelper::getAccessTokenFromHeaders(Yii::$app->request);

        if ($model->load(Yii::$app->request->post(), '') && $model->update()) {
            return $model;
        } else {
            $model->validate();
            return $model;
        }
    }

    public function actionChangePassword()
    {
        $model = new ChangePassword();
        $model->access_token = ApiHelper::getAccessTokenFromHeaders(Yii::$app->request);

        if ($model->load(Yii::$app->request->post(), '')) {
            if ($model->save()) {
                return "done";
            } else if (!$model->validate()) {
                Yii::$app->response->statusCode = 400;
                return $model;
            } else {
                throw new BadRequestHttpException("Old password not match !!");
            }
        }

        $model->validate();
        return $model;
    }


    public function actionUploadProfilePicture()
    {
        $model = new ProfilePicture();
        $model->user_id = ApiHelper::getUserFromRequest(Yii::$app->request)->id;
        $picture = UploadedFile::getInstanceByName('picture');
        if ($picture != null) {
            $currentDate = date('Y-m');
            ApiHelper::createUserProfileDirectoryOfCurrentMonthIfNotExists($currentDate);
            $model->picture = 'user-pictures/' . $currentDate . "/" . ApiHelper::guid() . '.' . $picture->extension;

            if (!$model->save()) {
                $model->validate();
                return $model;
            }

            $picture->saveAs('uploads/' . $model->picture);

            return $model;
        } else {
            $model->validate();
            return $model;
        }
    }

    public function actionChangePhoneNumber()
    {
        $model = new ChangePhoneNumber();
        $model->access_token = ApiHelper::getAccessTokenFromHeaders(Yii::$app->request);

        if ($model->load(Yii::$app->request->post(), '')) {
            if ($model->save()) {
                return UserProfile::getUserByAccessToken($model->access_token);
            }
        }
        $model->validate();
        return $model;
    }

    public function actionSendCode($phone_number)
    {

        try {
//            $basic  = new \Nexmo\Client\Credentials\Basic('956865a9', 'OIKFAdCiioRag265');
//            $client = new \Nexmo\Client($basic);
            /*
                        $verification = $client->verify()->start([
                            'number' => $phone_number,
                            'brand'  => 'HALIME S.N',
                            'code_length'  => '4']);*/
            $basic = new \Nexmo\Client\Credentials\Basic('31dcb840', 'TXkIdlXJjQh9Fx7j');
            $client = new \Nexmo\Client($basic);
            /*
                        $message = $client->message()->send([
                            'to' => $phone_number,
                            'from' => 'HALIME S.N',
                            'text' => 'Hello from Nexmo'
                        ]);
              */
            $sms = new \dosamigos\nexmo\Sms(['key' => '31dcb840', 'secret' => 'TXkIdlXJjQh9Fx7j', 'from' => 'HALIME S.N']);

            $message = "%LOGIN_CODE% is your verification code.";
            $response = $sms->sendText('962780663397', 'Hi Ersan ana amr !');

            return $response['message-count'];
            return "done";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
