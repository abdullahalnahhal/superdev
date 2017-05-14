<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PurchasingBillsDetailsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PurchasingBillsDetailsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\PurchasingBillsDetails';
}
