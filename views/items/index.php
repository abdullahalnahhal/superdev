<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/
$this->title = 'SuperDev | اﻷصناف';
?>
<div class="giiant-crud items-index" dir="rtl">
     <br>
     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['items/index'])?>" title="اﻷصناف"> اﻷصناف </a> <i class="fa fa-caret-left"></i> كل اﻷصناف
     <br>

    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
        <li role="presentation" id="tab-pane-init"  class="active"><a href="#main" role="tab" data-toggle="tab">البيانات العامة</a></li>
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
                </div>
                <div role="tabpanel" class="tab-pane" id="units">
                    <br>
                    <div class="row" dir="rtl">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-2">
                            <input type="text" class="form-control input" name="main-quantity" placeholder="الكمية من الصنف" data-content="يجب إدخال الكمية" required>
                        </div>
                        <div class="col-xs-1" >
                            الكمية من الصنف
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-2" >
                            <select data-placeholder="اختر الوحدة" name="main_unit_id" class="chosen-select input" tabindex="4" data-content="يجب إدخال الوحدة الرئيسية" required>
                                <option></option>
                                <?php
                                    foreach ($units as $key) {
                                        ?>
                                            <option value="<?=$key->id?>" > <?=$key->unit_name?> </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-2" >
                            الوحدة الرئيسية
                        </div>
                    </div>
                    <br>
                    <div class="row" dir="rtl" id="after-counting-area" >
                        <div class="col-xs-offset-3 col-xs-3" >
                            <i class="fa fa-plus-circle btn btn-success add" module="units" > إضافة وحدة فرعية  </i>
                        </div>    
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-3" >
                    <i class="btn btn-primary  fa fa-plus-circle submit"  form="items-form" > أضف اصنف  </i>
                    <i class="btn btn-danger  fa fa-trash submit-delete hidden"  form="items-form" > حذف  </i>
                    <i class="btn btn-success  fa fa-save submit-update hidden"  form="items-form" > تعديل  </i>
                    <i class="btn btn-info  fa fa-asterisk submit-new hidden"  form="items-form" > جديد  </i>
                </div>
            </div>
    </form>
    <hr>
        <table id = "datatable" class="table" dir="rtl">
            <thead dir="rtl" >
                <tr>
                    <th>الصنف</th>
                    <th>كود الصنف</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>أقل كمية</th>
                    <td></td>
                </tr>
            </thead>
        </table>
</div>


