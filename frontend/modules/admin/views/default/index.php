<?php
$this->title = Yii::t('app', 'Admin');
$this->params['breadcrumbs'][] = Yii::t('app', 'Admin');
?>
<div class="admin-default-index">

    <?= \yii\helpers\Html::a('Posts','admin/post/',['class'=>'btn btn-success']);?>
    <?= \yii\helpers\Html::a('User','admin/user/',['class'=>'btn btn-success']);?>
</div>
