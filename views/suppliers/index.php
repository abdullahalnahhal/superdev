<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/

$this->title = "الموردين";
?>
<div class="giiant-crud suppliers-index" dir="rtl">
		<br>
	     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['purchasing-bills/index'])?>" title="اﻷصناف"> المشتريات </a> <i class="fa fa-caret-left"></i> الموردين
	     <br>

	    <ul class="nav nav-tabs" role="tablist"  dir="rtl">
	        <li role="presentation" id="tab-pane-init"  class="active"><a href="#main" role="tab" data-toggle="tab">البيانات العامة</a></li>
	    </ul>
	    <form action="suppliers" err-msg="حدث خطأ في تسجيل الصنف من فضلك ؤاجع البيانات ثم كرر المحاولة" msg="تم إنشاء الصنف يمكنك إدخال صنف آخر اﻵن" method="POST"  id="suppliers-form" accept-charset="utf-8">
	            <div class="tab-content">
	                <div role="tabpanel" class="tab-pane active" id="main">
	                    	
	                        <div class="row" >
	                            <br>
	                            <div class="col-md-3 col-xs-3" >
	                                <input type="text" name="supplier_code" class="form-control input" placeholder="كود المورد" >
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                كود المورد
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                <input type="text" name="name" class="form-control input" data-content="يجب إدخال اسم المورد" placeholder="اسم المورد" required>
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                اسم المورد
	                            </div>
	                        </div>
	                        <br>
	                        <div class="row" >
	                            <div class="col-md-3 col-xs-3" >
	                            	<textarea name="Address" class="form-control input " data-content="يجب إدخال عنوان المورد أو عنوان شركته" placeholder="عنوان المورد أو عنوان شركته" style="resize:none" ></textarea>
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                عنوان المورد 
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                <input type="text" name="company" class="form-control input"  data-content="يجب إدخال شركة المورد" placeholder="شركة المورد"   >
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                شركة المورد
	                            </div>
	                        </div>
	                        <div class="row" >
	                            <div class="col-md-3 col-xs-3" ></div>
	                            <div class="col-md-3 col-xs-3" ></div>
	                            <div class="col-md-3 col-xs-3" >
	                                <input type="number" name="balance" class="form-control input"   placeholder="حساب المورد ( له ) و (- عليه)"   >
	                            </div>
	                            <div class="col-md-3 col-xs-3" >
	                                حساب المورد
	                            </div>
	                        </div>
	                </div>
	            </div>
	            <br>
	            <div class="row">
	                <div class="col-xs-5 col-xs-offset-3" >
	                    <i class="btn btn-primary  fa fa-plus-circle submit"  form="suppliers-form" > أضف مورد  </i>
	                    <i class="btn btn-danger  fa fa-trash submit-delete hidden"  form="suppliers-form" > حذف مورد</i>
	                    <i class="btn btn-success  fa fa-save submit-update hidden"  form="suppliers-form" > تعديل مورد</i>
	                    <i class="btn btn-info  fa fa-asterisk submit-new hidden"  form="itsuppliersems-form" > مورد جديد  </i>
	                </div>
	            </div>
	    </form>
	    <hr>
	        <table id = "datatable" class="table" dir="rtl">
	            <thead dir="rtl" >
	                <tr>
	                    <th>المورد</th>
	                    <th>كود المورد</th>
	                    <th>عنوان اﻻلمورد</th>
	                    <th>الشركة</th>
	                    <th>الحساب</th>
	                    <td></td>
	                </tr>
	            </thead>
	        </table>
</div>
<div id="details" class="modal fade">
	<div class="modal-content col-xs-5 col-xs-offset-3" >
		<div class="modal-body" >
			<table class="table" dir="rtl">
				<thead dir="rtl">
					<tr>
						<th>التاريخ</th>
						<th>دين</th>
						<th>تسديد</th>
					</tr>
				</thead>
				<tbody id="dets" dir="rtl">
				</tbody>
			</table>
		</div>
	</div>
</div>