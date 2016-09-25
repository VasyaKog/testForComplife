<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */

/* @var $models \app\modules\admin\models\Post[]; */
/* @var $pages \yii\data\Pagination */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Posts</h1>
    </div>

    <div class="body-content">
        <?php
        foreach ($models as $model) {
            ?>
            <div class="row">
                <h2>
                    <a href="/post/"<?= $model->id; ?>"><?= $model->title; ?></a>
                </h2>
                <p class="lead">
                    by <?= $model->user->username; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= date("d F", $model->created_at) ?>
                    , <?= date("Y", $model->created_at) ?> at <?= date("H:i A", $model->created_at) ?></p>
                <hr>
                <img class="img-responsive" src="<?= $model->getImageFileUrl('image'); ?>" alt="<?= $model->title; ?>">
                <hr>
                <p><?= $model->description; ?></p>
                <a class="btn btn-primary" href="/post/<?= $model->id; ?>">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

            </div>
        <?php } ?>
    </div>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>
