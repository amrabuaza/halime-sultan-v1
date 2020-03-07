<?php

namespace backend\modules\models\UserModels;

use backend\modules\models\ApiHelper;
use yii\base\Model;

class ChangePhoneNumber extends Model
{

    public $access_token;
    public $phone_number;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_token', 'phone_number'], 'required'],
            [['phone_number'], 'string'],
            [['phone_number'], 'safe'],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $user = ApiHelper::getUserFromToken($this->access_token);
            $user->phone_number = $this->phone_number;
            return $user->save();
        }
        return false;
    }

}