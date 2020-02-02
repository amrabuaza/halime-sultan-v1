<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemSize */

$this->title = 'Update Item Size: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Item Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-size-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
