<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "ItemsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ItemsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Items';
}
