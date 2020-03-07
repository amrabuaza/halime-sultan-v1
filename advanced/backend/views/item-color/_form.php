<?php

use backend\models\Item;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemColor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-color-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'item_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Item::find()->all(), 'id', 'name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Item name ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Item Name");?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
