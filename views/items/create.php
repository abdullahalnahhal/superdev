<?php

use yii\helpers\Html;
use vendor\kartik\widgets\Select2;
/**
* @var yii\web\View $this
* @var app\models\Items $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud items-create" dir="rtl">
    <br>
    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
        <li role="presentation" class="active"><a href="#main" role="tab" data-toggle="tab">البيانات العامة</a></li>
        <li role="presentation"><a href="#units" role="tab" data-toggle="tab">بيانات الوحدات</a></li>
    </ul>
    <form action="items" err-msg="حدث خطأ في تسجيل الصنف من فضلك ؤاجع البيانات ثم كرر المحاولة" msg="تم إنشاء الصنف يمكنك إدخال صنف آخر اﻵن" method="POST" id="items-form" accept-charset="utf-8">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="main">
                
                    <div class="row" >
                        <br>
                        <div class="col-md-3 col-xs-3" >
                            <input type="text" name="item_code" class="form-control input" placeholder="اذخل الباركود للصنف" >
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            كود الصنف
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            <input type="text" name="item_name" class="form-control input" data-content="يجب إدخال اسم الصنف" placeholder="اسم الصنف" required>
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            اسم الصنف
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3 col-xs-3" >
                            <input type="text" name="price" class="form-control input " data-content="يجب إدخال سعر أقل وحدة" placeholder="سعر أقل وحدة " required >
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            سعر أقل وحدة
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            <input type="text" name="less_quantity" class="form-control input"  data-content="يجب إدخال أقل كمية" placeholder="أقل كمية" required  >
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            أقل  كمية
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3 col-xs-3" >
                            <input type="text" name="quantity" class="form-control input" placeholder="الكمية" >
                        </div>
                        <div class="col-md-3 col-xs-3" >
                            الكمية
                        </div>
                    </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="units">
                <div class="row" dir="rtl">
                    <div class="col-md-3 col-xs-3" >
                        <i class="fa fa-plus-circle fa-2x btn btn-success"></i>
                    </div>
                    <div class="col-md-3 col-xs-3" >
                        <div id="the-basics">
                          <input data-provide="typeahead" name="main_unit_id" class="form-control typeahead input " type="text" placeholder="States of USA">
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-3" >
                        الوحدة الرئيسية
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-3 col-xs-offset-3" >
                <i class="btn btn-primary  fa fa-plus-circle submit" form="items-form" > أضف اصنف  </i>
            </div>
        </div>
    </form>
</div>
