<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "MainUnitsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MainUnitsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MainUnits';
}
