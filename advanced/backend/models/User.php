<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $birth_date
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
 * @property int $verified
 * @property string $access_token
 * @property int|null $picture_id
 * @property int $country_id
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this->isNewRecord) {
                $this->updated_at = date("Y-m-d H:i:s");
                if (isset($this->password)) {
                    $this->setPassword($this->password);
                    return true;
                }
            } else if ($this->isNewRecord) {
                $this->created_at = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'email', 'phone_number', 'gender', 'birth_date'], 'required'],
            [['status', 'verified', 'picture_id', 'country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string'],
            [['password'], 'string'],
            [['birth_date', 'created_at', 'updated_at'], 'safe'],
            [['username', 'first_name', 'last_name', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'phone_number', 'verification_code', 'access_token'], 'string', 'max' => 255],
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
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
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
            'verified' => 'Verified',
            'access_token' => 'Access Token',
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

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

}
