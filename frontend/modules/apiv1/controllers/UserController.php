<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06.10.2016
 * Time: 17:06
 */

namespace frontend\modules\apiv1\controllers;

use common\models\User;
use yii\data\ArrayDataProvider;
use yii\rest\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $params = \Yii::$app->request->get();
        $dataProvider = new ArrayDataProvider([
            'allModels' => User::find()->asArray()->all()
        ]);
        return [
            'items'=>$dataProvider,
            'total'=>$dataProvider->totalCount,
        ];
    }
}