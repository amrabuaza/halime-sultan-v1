<?php

namespace backend\modules\models\UserModels;

use backend\models\Country;
use backend\models\UserPicture;
use yii\base\Model;

class UserProfile extends Model
{
    public $access_token;
    public $username;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $gender;
    public $birth_date;
    public $profile_picture;
    public $country_id;
    public $country;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['username', 'first_name', 'last_name', 'email', 'gender', 'country_id'], 'required'],
            [['username', 'first_name', 'last_name', 'gender', 'email', 'phone_number'], 'string'],
            [['country_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['email', 'username', 'first_name', 'last_name'], 'safe'],
        ];
    }

    public function update()
    {
        if ($this->validate()) {

            $user = User::findOne(['access_token' => $this->access_token]);

            $user->username = $this->username;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->gender = $this->gender;
            $user->country_id = $this->country_id;

            return $user->save();
        }
        return false;
    }

    public static function getUserByAccessToken($accessToken)
    {
        $user = User::findOne(["access_token" => $accessToken]);

        if ($user == null) {
            return null;
        }

        $userProfile = new UserProfile();


        $userProfile->username = $user->username;
        $userProfile->first_name = $user->first_name;
        $userProfile->last_name = $user->last_name;
        $userProfile->gender = $user->gender;
        $userProfile->email = $user->email;
        $userProfile->phone_number = $user->phone_number;
        $userProfile->access_token = $user->access_token;
        $userProfile->birth_date = $user->birth_date;
        $userProfile->country_id = $user->country_id;
        $userProfile->country = Country::findOne($userProfile->country_id)->country_name;


        if ($user->picture_id != null) {
            $uploadsUrl = "http://localhost/halime-sultan/advanced/backend/web/uploads/";
            $pictureName = UserPicture::findOne($user->picture_id)->name;
            $userProfile->profile_picture = $uploadsUrl . $pictureName;
        }

        return $userProfile;
    }

}
