<?php

use backend\models\Item;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemPhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-sm-4">
        <div class="item-photo-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php
            $initialPreview = [];

            $pathImg = '../uploads/' . $model->name;
            $model->upload_image = $pathImg;
            $initialPreview[] = Html::img($pathImg, ['class' => 'upload-image']);
            ?>

            <?=$form->field($model, "upload_image")->label(false)
                ->widget(FileInput::classname(), [
                    'options' => [
                        'multiple' => false,
                        'accept' => 'image/*',
                        'class' => 'optionvalue-img'
                    ],
                    'pluginOptions' => [
                        'previewFileType' => 'image',
                        'showCaption' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-default btn-sm',
                        'browseLabel' => ' Pick image',
                        'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',
                        'removeClass' => 'btn btn-danger btn-sm',
                        'removeLabel' => ' Delete',
                        'removeIcon' => '<i class="fa fa-trash"></i>',
                        'previewSettings' => [
                            'image' => ['width' => '100px', 'height' => 'auto']
                        ],
                        'initialPreview' => $initialPreview,

                    ]
                ])?>


            <?=$form->field($model, 'item_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Item::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Item name ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label("Item Name");?>

            <div class="form-group">
                <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

