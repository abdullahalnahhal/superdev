<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/
$this->title = "عملية بيع جديدة";
?>
<div class="giiant-crud purchasing-bills-index" dir="rtl">
     <br>
     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['selling-bills/index'])?>" title="المبيعات"> المبيعات </a> <i class="fa fa-caret-left"></i> الكاشير
     <br>

    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
        <li role="presentation" id="tab-pane-init"  class="active"><a href="#main" role="tab" data-toggle="tab">البيانات العامة</a></li>
        <li role="presentation" ><a href="javascript:void(0)" role="tab" id="total-price" ></a></li>
    </ul>
            <div class="tab-content">
                <br>
                <div class="row" dir="rtl">
                    <br>
                    <div class="col-xs-2" >
                        <input disabled type="number" id="price" name="price" class="form-control "  value="0" placeholder="التكلفة">
                    </div>
                    <div class="col-xs-1" >السعر</div>
                    <div class="col-xs-2" >
                        <input type="number" id="quantity" name="quantity" class="form-control "  value="0" placeholder="الكمية">
                    </div>
                    <div class="col-xs-1" >الكمية</div>
                    <div class="col-xs-2" >
                        <span class="based-units" >
                            <select  data-placeholder="الوحدة" id="units"  name="units" class=" chosen-select form-control " data-content="يجب إدخال المورد" required>
                                <option value=""></option>
                            </select>
                        </span>
                    </div>
                    <div class="col-xs-1" >الوحدة</div>

                    <div class="col-xs-2" >
                        <input list="items-list" id="item_code" name="item_code" class="base-select form-control " placeholder="اﻷصناف" get="items-units" to="based-units" data-content="يجب إدخال المورد" required>
                        <datalist id="items-list" class="list-group" >
                            <?php
                                foreach ($items as $key ) {
                            ?>
                                <option class="list-group-item" value="<?=$key->item_code?>" quantity="<?=$key->quantity?>" price="<?=$key->price?>"><?=$key->item_name?></option>
                            <?php
                                }
                            ?>
                        </datalist>
                    </div>
                    <div class="col-xs-1" >الصنف</div>
                </div>
                
                <div class="row" dir="rtl">
                    <br>
                    <div class="col-xs-5 col-xs-offset-2" >
                        <button type="button" class=" btn btn-success fa fa-plus-circle add-bill" module="purchasing_bill"> إضافة صنف </button>
                    </div>
                </div>
                <hr>
           
            </div>
                <div class="row" >
                    <table id="selling-bill" class="col-xs-12 table " >
                        <thead>
                            <th style="text-align: right;" >الصنف</th>
                            <th style="text-align: right;" >الوحدة</th>
                            <th style="text-align: right;" >الكمية</th>
                            <th style="text-align: right;" >السعر</th>
                            <th style="text-align: right;" ></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            <br>
            <form action="selling-bills" err-msg="حدث خطأ في تسجيل الصنف من فضلك ؤاجع البيانات ثم كرر المحاولة" msg="تم إنشاء الصنف يمكنك إدخال صنف آخر اﻵن" method="POST" id="form" accept-charset="utf-8"></form>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-2" >
                    <i class="btn btn-primary  fa fa-plus-circle submit"  form="form" > أضف فاتورة  </i>
                    <i class="btn btn-danger  fa fa-trash submit-delete hidden"  form="form" > حذف  </i>
                    <i class="btn btn-success  fa fa-save submit-update hidden"  form="form" > تعديل  </i>
                    <i class="btn btn-info  fa fa-asterisk submit-new hidden"  form="form" > جديد  </i>
                </div>
            </div>
    
</div>

