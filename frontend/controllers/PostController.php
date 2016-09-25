<?php

namespace frontend\controllers;

use app\modules\admin\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model=Post::findOne($id);
        return $this->render('index',
            [
                'model' => $model,
            ]
        );
    }

}
