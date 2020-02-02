<?php

use kartik\file\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Mange Item Photo';
$itemName = \backend\models\Item::findOne($itemId)->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $itemName, 'url' => ['view' , 'id'=>$itemId]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="item-photo-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Photos</h4></div>
            <div class="panel-body">
                <?php

                DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-photos', // required: css class selector
                    'widgetItem' => '.photo', // required: css class
                    'limit' => 20, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-photo', // css class
                    'deleteButton' => '.remove-photo', // css class
                    'model' => $itemPhotos[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'upload_image'
                    ],
                ]); ?>

                <div class="container-photos"><!-- widgetContainer -->
                    <?php foreach ($itemPhotos as $i => $value): ?>
                        <div class="photo panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Photo</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-photo btn btn-success btn-xs"><i
                                            class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-photo btn btn-danger btn-xs"><i
                                            class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                $initialPreview = [];

                                if (!$value->isNewRecord) {
                                    $pathImg = '../uploads/' . $value->name;
                                    $initialPreview[] = Html::img($pathImg, ['class' => 'upload-image']);
                                }
                                ?>

                                <?= $form->field($value, "[{$i}]upload_image")->label(false)->widget(FileInput::classname(), [
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
                                        'removeIcon' => '<i class="fa fa-trash hidden"></i>',
                                        'previewSettings' => [
                                            'image' => ['width' => '100px', 'height' => 'auto']
                                        ],
                                        'initialPreview' => $initialPreview,
                                    ]
                                ]) ?>

                                <?= $form->field($value, "[{$i}]id")->hiddenInput()->label(false) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($actionName == "Add" ? 'Add' : 'Update', ['class' => $actionName == "Add" ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
