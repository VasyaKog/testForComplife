<?php
namespace backend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends ActiveController
{
    public $modelClass='backend\modules\v1\models\User';
}
