<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/
$this->title = 'SuperDev | الوحدات';
?>
<div class="giiant-crud items-index" dir="rtl">
     <br>
     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['items/index'])?>" title="اﻷصناف"> اﻷصناف </a> <i class="fa fa-caret-left"></i> كل الوحدات
     <br>

    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
        <li role="presentation" class="active"><a href="#main" role="tab" data-toggle="tab">تسجيل وحدة جديدة</a></li>
    </ul>
    <form action="units" err-msg="حدث خطأ في تسجيل الصنف من فضلك ؤاجع البيانات ثم كرر المحاولة" msg="تم إنشاء الصنف يمكنك إدخال صنف آخر اﻵن" method="POST" id="units-form" accept-charset="utf-8">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="main">
                    
                        <div class="row" >
                            <br>
                            <div class="col-md-3 col-xs-3" ></div>
                            <div class="col-md-3 col-xs-3" ></div>
                            <div class="col-md-3 col-xs-3" >
                                <input type="text" name="unit_name" class="form-control input" data-content="يجب إدخال الوحدة" placeholder="الوحدة" required>
                            </div>
                            <div class="col-md-3 col-xs-3" >
                                اسم الصنف
                            </div>
                        </div>
                        <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-3" >
                    <i class="btn btn-primary  fa fa-plus-circle submit"  form="units-form" > أضف اصنف  </i>
                    <i class="btn btn-danger  fa fa-trash submit-delete hidden"  form="units-form" > حذف  </i>
                    <i class="btn btn-success  fa fa-save submit-update hidden"  form="units-form" > تعديل  </i>
                    <i class="btn btn-info  fa fa-asterisk submit-new hidden"  form="units-form" > جديد  </i>
                </div>
            </div>
    </form>
    <hr>
        <table id = "datatable" class="table" dir="rtl">
            <thead dir="rtl" >
                <tr>
                    <th>الوحدة</th>
                    <td></td>
                </tr>
            </thead>
        </table>
    <!-- </fieldset> -->
</div>