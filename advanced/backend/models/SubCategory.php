<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $base_category_id
 *
 * @property Item[] $items
 * @property Category $baseCategory
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'base_category_id'], 'required'],
            [['base_category_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['base_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['base_category_id' => 'id']],
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
            'description' => 'Description',
            'base_category_id' => 'Base Category ID',
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['sub_category_id' => 'id']);
    }

    /**
     * Gets query for [[BaseCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaseCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'base_category_id']);
    }
}
