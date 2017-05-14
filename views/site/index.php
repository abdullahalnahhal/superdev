<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'SuperDev | الرئيسية';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <a href="<?=Url::to(['items/index'])?>" >
                <div class="main-blue main-logo col-lg-2 col-md-4 col-sm-4 col-xs-6" >
                    <i class="fa fa-cubes fa-5"></i>  
                    <br>
                    <B>اﻷصناف</B>
                </div>
            </a>

            <a href="<?=Url::to(['purchasing-bills/index'])?>" >
                <div class="main-green main-logo col-xs-offset-1 col-lg-2 col-md-4 col-sm-4 col-xs-5" >
                    <i class="fa fa-cart-arrow-down fa-6"></i>  
                    <br>
                    <B>المشتريات</B>
                </div>
            </a>

            <a href="<?=Url::to(['selling-bills/index'])?>" >
                <div class="main-red main-logo col-xs-offset-1 col-lg-2 col-md-4 col-sm-4 col-xs-5" >
                    <i class="fa fa-shopping-bag fa-6"></i>  
                    <br>
                    <B>المبيعات</B>
                </div>
            </a>
            <a href="<?=Url::to(['selling-bills/index'])?>" >
                <div class="main-yellow main-logo col-xs-offset-1 col-lg-2 col-md-4 col-sm-4 col-xs-5" >
                    <i class="fa fa-users fa-6"></i>  
                    <br>
                    <B>المستخدمين</B>
                </div>
            </a>
        </a>
        </div>
    </div>
</div>
