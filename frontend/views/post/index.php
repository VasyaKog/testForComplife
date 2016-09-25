<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\Post */
?>
<? $this->params['breadcrumbs'][] = $model->title;?>
<div class="row">
    <h2>
        <?= $model->title;?>
    </h2>
    <p class="lead">
        by <?= $model->user->username;?>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= date("d F",$model->created_at)?>, <?= date("Y",$model->created_at)?> at <?= date("H:i A",$model->created_at)?></p>
    <hr>
    <img class="img-responsive" src="<?=$model->getImageFileUrl('image');?>" alt="<?= $model->title;?>">
    <hr>
    <?= $model->full_text;?>
    <hr>

</div>
