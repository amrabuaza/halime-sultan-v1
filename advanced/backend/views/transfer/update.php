<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Update Transfer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
