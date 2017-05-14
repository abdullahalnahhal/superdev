<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SellingBillsDetailsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SellingBillsDetailsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\SellingBillsDetails';
}
