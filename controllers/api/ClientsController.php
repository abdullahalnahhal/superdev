<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "ClientsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ClientsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Clients';
}
