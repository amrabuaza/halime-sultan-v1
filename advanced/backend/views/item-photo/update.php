<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemPhoto */

$this->title = 'Update Item Photo: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-photo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
