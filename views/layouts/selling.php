<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use kartik\widgets\Select2;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <header class="col-xs-12">
       <a href="<?=Url::to(['items/index'])?>" title="اﻷصناف" >
            <div class="main-blue header-logo thumbnail" >
                <i class="fa fa-cubes fa-3x"></i>  
            </div>
        </a>
        <a href="<?=Url::to(['purchasing-bills/index'])?>" title="المشتريات" >
            <div class="main-green header-logo thumbnail" >
                <i class="fa fa-cart-arrow-down fa-3x"></i>  
            </div>
        </a>
        <a href="<?=Url::to(['selling-bills/index'])?>" title="المبيعات" >
            <div class="main-red header-logo thumbnail" >
                <i class="fa fa-shopping-bag fa-3x"></i>  
            </div>
        </a>
        <a href="<?=Url::to(['selling-bills/index'])?>" title="المستخدمين" >
            <div class="main-yellow header-logo thumbnail" >
                <i class="fa fa-users fa-3x"></i>  
            </div>
        </a>
    </header>
<div class="container-fluid">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
        <?= $content ?>
    </div>
    <div class="lefter col-lg-offset-1 col-xs-2" >
        <br>
        <br>
        <div class="col-xs-12" >
            <a href="<?=Url::to(['selling-bills/index'])?>" title=" البيع المباشر">
                <div class=" sub-logo ">
                    <div class="main-orange head col-xs-offset-3 col-xs-7" >
                        <i class="fa fa-shopping-basket fa-4x"></i> 
                    </div>
                    <div class="col-xs-12" >
                        <B> البيع المباشر </B>
                    </div>
                </div>
            </a>
            <a href="<?=Url::to(['selling-bills/sales'])?>" title="المبيعات">
                <div class=" sub-logo ">
                    <div class="main-red head col-xs-offset-3 col-xs-7" >
                        <i class="fa fa-ticket fa-4x"></i> 
                    </div>
                    <div class="col-xs-12" >
                        <B> المبيعات </B>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<div class="modal spinny fade" id="modal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="loader">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
