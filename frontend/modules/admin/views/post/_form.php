<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\imagine\Image;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(
        [
            'enableAjaxValidation' => false,
            'options' =>
                [
                    'enctype' => 'multipart/form-data',
                ]
        ]
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?php if($model->image) : ?>
        <a href="<?= $model->getImageFileUrl('image') ?>" class="fancybox"><?php echo Html::img($model->getImageFileUrl('image'),['width'=>'40%']);?></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput(); ?>

    <?= $form->field($model, 'full_text')->widget(\mihaildev\ckeditor\CKEditor::className()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
