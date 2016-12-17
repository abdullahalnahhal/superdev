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


    <hr>
        <table id = "datatable" class="table" dir="rtl">
            <thead dir="rtl" >
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>المورد</th>
                    <th>إجمالى الفاتورة</th>
                    <th>إجمالى الخصم</th>
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
                        <th>الصنف</th>
                        <th>الكمية</th>
                        <th>التكلفة</th>
                    </tr>
                </thead>
                <tbody id="dets" dir="rtl">
                </tbody>
            </table>
        </div>
    </div>
</div>