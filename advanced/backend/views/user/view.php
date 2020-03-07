<?php

use backend\models\UserPicture;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$profilePicture = UserPicture::findOne(['user_id' => $model->id]);
?>
<div class="user-view">
    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this user?',
                'method' => 'post',
            ],
        ])?>
    </p>

    <br/>
    <div class="row">
        <div class="col-sm-4 "></div>
        <div class="col-sm-4">
            <?php
            if ($profilePicture != null) {
                echo Html::img('/halime-sultan/advanced/backend/web/uploads/' . $profilePicture->name, ['class' => 'img-circle  user-profile-picture']);
            }
            ?>
        </div>
    </div>
    <br/>

    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'first_name',
            'last_name',
            'gender',
            'birth_date',
            'email:email',
            [
                'label' => 'Status',
                'value' => $model->status == 10 ? "Active" : "Blocked"
            ],
            [
                'label' => 'Verified',
                'value' => $model->verified == 1 ? "Yes" : "No"
            ],
            'created_at',
            'updated_at',
            'type',
            'phone_number',
        ],
    ])?>

</div>
