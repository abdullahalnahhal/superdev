<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SuppliersAccountsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SuppliersAccountsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\SuppliersAccounts';
}
