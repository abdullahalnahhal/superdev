<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SubUnitsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SubUnitsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\SubUnits';
}
