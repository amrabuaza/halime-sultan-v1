<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

$this->title = 'Mange Item Color';
$itemName = \backend\models\Item::findOne($itemId)->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $itemName, 'url' => ['view', 'id' => $itemId]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJS(<<<JS

$(function(){
    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
       $('.color-attr:last').val('');
        $('.color-id:last').val('');
    });
});
JS
);

?>

<div class="color-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="glyphicon glyphicon-eye-open"></i> Colors</h4></div>
                <div class="panel-body">
                    <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-colors', // required: css class selector
                        'widgetItem' => '.color', // required: css class
                        'limit' => 4, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-color', // css class
                        'deleteButton' => '.remove-color', // css class
                        'model' => $itemColors[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                            'color'
                        ],
                    ]); ?>

                    <div class="container-colors"><!-- widgetContainer -->
                        <?php foreach ($itemColors as $i => $modelColor): ?>
                            <div class="color panel panel-default"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Color</h3>
                                    <div class="pull-right">
                                        <button type="button" class="add-color btn btn-success btn-xs"><i
                                                    class="glyphicon glyphicon-plus"></i></button>
                                        <button type="button" class="remove-color btn btn-danger btn-xs"><i
                                                    class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (!$modelColor->isNewRecord) {
                                        echo Html::activeHiddenInput($modelColor, "[{$i}]id",['class'=>'color-id']);
                                    }
                                    ?>

                                    <?=$form->field($modelColor, "[{$i}]color")->textInput(['class'=>'color-attr form-control','maxlength' => true])?>

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
        <?=Html::submitButton($actionName == "Add" ? 'Add' : 'Update', ['class' => $actionName == "Add" ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
