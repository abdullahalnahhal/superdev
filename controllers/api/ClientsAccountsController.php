<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "ClientsAccountsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ClientsAccountsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\ClientsAccounts';
}
