<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Add Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
