<?php


use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
    <div class="form-group row">
        <div class="col-sm-5">
            <div class="user-form">

                <?php $form = ActiveForm::begin(); ?>

                <?=$form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control'])?>

                <?=$form->field($model, 'first_name')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'last_name')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female'])?>


                <?= $form->field($model, 'birth_date')->widget(\yii\jui\DatePicker::classname(), [
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>



                <br/>

                <?php if (!$model->isNewRecord) { ?>
                    <div class="btn btn-info btn-sm password-click">Edit Password !!</div>
                    <div class="pass-in">
                        <?=$form->field($model, 'password')->passwordInput(['maxlength' => true])?>
                    </div>
                    <br/>
                <?php } else {
                    echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
                } ?>
                <br/>
                <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'status')->dropDownList(['10' => 'Active', '9' => 'Blocked',])?>

                <?=$form->field($model, 'type')->dropDownList(['admin' => 'Admin', 'user' => 'User',])?>

                <?=$form->field($model, 'phone_number')->textInput(['maxlength' => true])?>


                <div class="form-group">
                    <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

