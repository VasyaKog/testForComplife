<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>function($model, $key, $index, $widget) {
                    return common\models\User::getStatus($model->status);
                }
            ],
            // 'created_at',
            // 'updated_at',
            [
                'attribute' => 'role',
                'format' => 'raw',
                'value' =>function($model, $key, $index, $widget) {
                    return common\models\User::getRole($model->role);
                }
            ],
           [
               'class' => \yii\grid\ActionColumn::className(),
               'template' => '{update} {delete}',
           ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
