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
use frontend\models\SignupForm;
use Yii;

class UserController extends Controller
{
    public function actionIndex()
    {
        $params = \Yii::$app->request->get();
        $dataProvider = new ArrayDataProvider([
            'allModels' => User::find()->asArray()->all()
        ]);
        return [
            'items' => $dataProvider,
            'total' => $dataProvider->totalCount,
        ];
    }
    
    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $model = new SignupForm();
        $model->username = $params["username"];
        $model->email = $params["email"];
        $model->password = $params["password"];
        if ($user = $model->signup()) {
            if (Yii::$app->getUser()->login($user)) {
                return ['status' => '200'];
            }
        }
        return ['status' => '500'];
    }

    public function actionStatus($id)
    {
        /**
         * @var $current User
         */
        $current = User::find()->where(['id' => $id])->one();
        return [
            'status' => $current->status,
            'role' => $current->role,
        ];
    }

    /**
     * @return string
     */
    public function actionDelete($id)
    {
        return User::findOne($id)->delete();
    }

    public function actionView($id){
        return User::findOne($id);
    }

    public function actionChangestatus($id){
        $user = User::findOne($id);

        $user->status=abs($user->status-10);
        $user->save();
        return ['newStatus'=>$user->status];
    }

    public function actionChangerole($id){
        /**
         * @var $user User
         */
        $user = User::findOne($id);
        switch ($user->role) {
            case 10:{
                $user->role=20;
                break;
            }
            case 20: {
                $user->role=10;
                break;
            }
            default:break;
        }
        $user->save();
        return ['NewRole'=> User::getRole($user->role)];
    }
}