<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SellingBillsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SellingBillsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\SellingBills';
}
