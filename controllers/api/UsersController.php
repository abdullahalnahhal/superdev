<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "UsersController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UsersController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Users';
}
