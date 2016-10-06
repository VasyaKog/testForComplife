<?php
namespace backend\controllers;
use Yii;
use yii\rest\ActiveController;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06.10.2016
 * Time: 16:29
 */
class UserController extends ActiveController
{
    public $modelClass = 'backend\modules\v1\models\User';
}