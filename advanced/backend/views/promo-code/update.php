<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PromoCode */

$this->title = 'Update Promo Code: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Promo Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promo-code-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
