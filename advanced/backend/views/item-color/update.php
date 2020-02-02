<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemColor */

$this->title = 'Update Item Color: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Item Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-color-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
