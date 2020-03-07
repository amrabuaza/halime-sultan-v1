<?php

namespace backend\modules\models\UserModels;

use backend\models\UserPicture;
use Yii;
use yii\base\Model;

class ProfilePicture extends Model
{

    public $user_id;
    public $picture;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture', 'user_id'], 'required'],
            [['picture',], 'string'],
            [['picture',], 'string'],
            [['picture',], 'safe'],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $user = User::findOne($this->user_id);

            $userPicture = new UserPicture();
            $userPicture->user_id = $user->id;
            $userPicture->name = $this->picture;

            if (!$userPicture->save()) {
                return $userPicture->validate();
            }

            $condition = ['AND',
                ['NOT',['id'=>$userPicture->id]],
                ["user_id" => $user->id]
            ];

            UserPicture::deleteAll($condition);

            $user->picture_id = $userPicture->id;
            return $user->save();
        }
        return false;
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['id']);
        unset($fields['user_id']);
        unset($fields['picture']);

        $fields['url'] = function ($model) {
            $uploadsUrl = "http://localhost/halime-sultan/advanced/backend/web/uploads/";
            return $uploadsUrl . $this->picture;
        };
        return $fields;
    }


}