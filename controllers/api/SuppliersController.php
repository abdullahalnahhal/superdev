<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SuppliersController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SuppliersController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Suppliers';
}
