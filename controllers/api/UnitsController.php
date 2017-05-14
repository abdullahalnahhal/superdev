<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "UnitsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UnitsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Units';
}
