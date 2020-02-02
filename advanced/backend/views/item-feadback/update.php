<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemFeadback */

$this->title = 'Update Item Feadback: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Item Feadbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-feadback-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
