<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PurchasingBillsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PurchasingBillsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\PurchasingBills';
}
