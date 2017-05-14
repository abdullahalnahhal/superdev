<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
*/


$this->title = "المبيعات";
?>
<div class="giiant-crud purchasing-bills-index" dir="rtl">
     <br>
     <a href="<?=Url::to(['site/index'])?>" title="الرئيسية"> الرئيسية</a> <i class="fa fa-caret-left"></i> <a href="<?=Url::to(['selling-bills/index'])?>" title="اﻷصناف"> المشتريات </a> <i class="fa fa-caret-left"></i> فواتير الشراء
     <br>
     <br>
     <div class="row" >
        <form action="<?=Url::to(['selling-bills/sales'])?>" method="POST" accept-charset="utf-8">
            <div class="col-xs-6" >
                <input type="date" name="date" dir="rtl"class="form-control">
            </div>
            <button type="submit" class="col-xs-4 btn btn-primary"> بحث </button>
        </form>
     </div>
    <hr>
        <table id="datatable" class="table datatable" dir="rtl">
            <thead dir="rtl" >
                <tr>
                    <th>تاريخ الفاتورة</th>
                    <th>إجمالى الفاتورة</th>
                    <th>إجمالى الخصم</th>
                    <td></td>
                </tr>
            </thead>
            <tbody dir="rtl">
                    <?php
                        $total = 0;
                        foreach ($model as $key ) {
                            $total = $key->total_price+ $total;
                    ?>

                        <tr>
                            <td><?=$key->date?></td>
                            <td><?=$key->total_price?></td>
                            <td><?=$key->total_discount?></td>
                            <td>
                                <a href="javascript:void(0);"  element="<?=$key->id?>" onclick="main.details('<?=$key->id?>')" class="row-view btn btn-info" title="التفاصيل"><i class='fa fa-list' ></i></a>
                                <a href="javascript:void(0);"  element="<?=$key->id?>" onclick="main.delete('<?=$key->id?>')" class="row-delete btn btn-danger" title="حذف"><i class='fa fa-trash' ></i></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
            </tbody>
        </table>
        <h3> الإجمالي : <?= $total ?> </h3>
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