<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/


$this->title = "فواتير الشراء";
?>
<div class="giiant-crud purchasing-bills-index" dir="rtl">
	 <br>
     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['purchasing-bills/index'])?>" title="اﻷصناف"> المشتريات </a> <i class="fa fa-caret-left"></i> فواتير الشراء
     <br>

    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
        <li role="presentation" id="tab-pane-init"  class="active"><a href="#main" role="tab" data-toggle="tab">البيانات العامة</a></li>
    </ul>
    <form action="purchasing-bills" err-msg="حدث خطأ في تسجيل الصنف من فضلك ؤاجع البيانات ثم كرر المحاولة" msg="تم إنشاء الصنف يمكنك إدخال صنف آخر اﻵن" method="POST" id="items-form" accept-charset="utf-8">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="main">
                        <div class="row" >
                            <br>
                            <div class="col-md-3 col-xs-3" >
                                <select data-placeholder="اختر المورد" name="suppliers" class=" chosen-select form-control input " data-content="يجب إدخال المورد" required>
                                    <option value=""></option>
                                    <?php
                                        foreach ($suppliers as $key ) {
                                    ?>
                                        <option value="<?=$key->supplier_code?>"><?=$key->name?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-xs-3" >
                                المورد
                            </div>
                            <div class="col-md-3 col-xs-3" >
                                <input type="text" name="bill_code" class="form-control input"  placeholder="كود الفاتورة">
                            </div>
                            <div class="col-md-3 col-xs-3" >
                                كود الفاتورة
                            </div>
                        </div>
                        <br>
                </div>
                <br>
                <div class="row" dir="rtl">
                    <br>
                    <div class="col-xs-2" >
                        <input type="text" name="cost" class="form-control input"  placeholder="التكلفة">
                    </div>
                    <div class="col-xs-1" >التكلفة</div>
                    <div class="col-xs-2" >
                        <input type="text" name="quantity" class="form-control input"  placeholder="الكمية">
                    </div>
                    <div class="col-xs-1" >الكمية</div>
                    <div class="col-xs-2" >
                        <span class="based-units" >
                            <select  data-placeholder="الوحدة" name="units" class=" chosen-select form-control input" data-content="يجب إدخال المورد" required>
                                <option></option>
                            </select>
                        </span>
                    </div>
                    <div class="col-xs-1" >الوحدة</div>

                    <div class="col-xs-2" >
                        <input type="text" name="item_code" class="base-select form-control input" placeholder="اﻷصناف" get="items-units" to="based-units" data-content="يجب إدخال المورد" required>
                    </div>
                    <div class="col-xs-1" >كود الصنف</div>
                </div>
                <div id="after-counting-area" >
                    
                </div>
                <div class="row" dir="rtl">
                    <br>
                    <div class="col-xs-5 col-xs-offset-2" >
                        <button type="button" class=" btn btn-success fa fa-plus-circle add" module="purchasing_bill"> إضافة صنف </button>
                    </div>
                </div>
                <hr>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-2" >
                    <i class="btn btn-primary  fa fa-plus-circle submit"  form="items-form" > أضف فاتورة  </i>
                    <i class="btn btn-danger  fa fa-trash submit-delete hidden"  form="items-form" > حذف  </i>
                    <i class="btn btn-success  fa fa-save submit-update hidden"  form="items-form" > تعديل  </i>
                    <i class="btn btn-info  fa fa-asterisk submit-new hidden"  form="items-form" > جديد  </i>
                </div>
            </div>
    </form>
</div>

