<?php

namespace backend\modules\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property string $phone_number
 * @property string|null $verification_code
 * @property string $access_token
 * @property int|null $picture_id
 *
 * @property Transaction[] $transactions
 * @property Transfer[] $transfers
 * @property UserAddress[] $userAddresses
 * @property UserOrder[] $userOrders
 * @property UserOrderHestory[] $userOrderHestories
 */
class User extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 9;
    const STATUS_ACTIVE = 10;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if(!$this->isNewRecord)
            {
                $this->updated_at = date("Y-m-d H:i:s");
                if ($this->password != NULL) {
                    $this->setPassword($this->password);
                    return true;
                }
            }else if($this->isNewRecord)
            {
                $this->created_at = date("Y-m-d H:i:s");
            }
            return true;
        }return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'phone_number'], 'required'],
            [['status', 'picture_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string'],
            [['username', 'first_name', 'access_token','last_name', 'password_hash', 'password_reset_token', 'email', 'phone_number', 'verification_code'], 'string', 'max' => 255],
            [['auth_key'], 'string'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
            'phone_number' => 'Phone Number',
            'verification_code' => 'Verification Code',
            'picture_id' => 'Picture ID',
        ];
    }

    /**
     * Gets query for [[Transactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['user_address_id' => 'id']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserOrderHestories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrderHestories()
    {
        return $this->hasMany(UserOrderHestory::className(), ['user_id' => 'id']);
    }

    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString().$this->guid();
    }

    public static function findIdentityByAccessToken($token)
    {
        return static::findOne(['access_token' => $token]);
    }

    function guid()
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
