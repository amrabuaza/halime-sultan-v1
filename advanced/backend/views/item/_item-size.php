<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Mange Item Size';
$itemName = \backend\models\Item::findOne($itemId)->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $itemName, 'url' => ['view' , 'id'=>$itemId]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="item-size-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Sizes</h4></div>
            <div class="panel-body">
                <?php ;

                DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-sizes', // required: css class selector
                    'widgetItem' => '.size', // required: css class
                    'limit' => 20, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-size', // css class
                    'deleteButton' => '.remove-size', // css class
                    'model' => $itemSizes[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'Size'
                    ],
                ]); ?>

                <div class="container-sizes"><!-- widgetContainer -->
                    <?php foreach ($itemSizes as $i => $value): ?>
                        <div class="size panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Size</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-size btn btn-success btn-xs"><i
                                                class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-size btn btn-danger btn-xs"><i
                                                class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?= $form->field($value, "[{$i}]size")->textInput(['maxlength' => true]) ?>
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