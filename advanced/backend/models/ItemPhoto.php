<?php

namespace backend\models;

use Baha2Odeh\EasyFileUpload\EasyFileUploadBehavior;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "item_photo".
 *
 * @property int $id
 * @property string $name
 * @property int $item_id
 *
 * @property Item $item
 */
class ItemPhoto extends \yii\db\ActiveRecord
{

    public $upload_image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['upload_image'],'safe'],
            [['name'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }


    public function fields()
    {
        $fields = parent::fields();

        unset($fields['id']);
        unset($fields['item_id']);
        unset($fields['name']);

        $fields['url'] = function ($model) {
            $uploadsUrl = "http://localhost/halime-sultan/advanced/backend/web/uploads/";
            return $uploadsUrl . $this->name;
        };
        return $fields;
    }

}
