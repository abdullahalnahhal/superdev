<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\MainUnits $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'MainUnits');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MainUnits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud main-units-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'MainUnits') ?>        <small>
            <?= $model->id ?>        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id' => $model->id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id' => $model->id, 'MainUnits'=>$copyParams],
            ['class' => 'btn btn-success']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('app\models\MainUnits'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'units_id',
    'value' => ($model->getUnits()->one() ? Html::a($model->getUnits()->one()->id, ['units/view', 'id' => $model->getUnits()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Items'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Items',
            ['items/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Item',
            ['items/create', 'Items' => ['main_unit_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Items', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Items ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">' . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getItems(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-items']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'items' . '/' . $action;
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'items'
],
        'id',
        'item_code',
        'item_name',
        'quantity',
        'price',
]
]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('SubUnits'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Sub Units',
            ['sub-units/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Sub Unit',
            ['sub-units/create', 'SubUnits' => ['main_unit_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-SubUnits', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-SubUnits ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">' . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getSubUnits(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-subunits']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'sub-units' . '/' . $action;
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'sub-units'
],
        'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'units_id',
    'value' => function ($model) {
        if ($rel = $model->getUnits()->one()) {
            return Html::a($rel->id, ['units/view', 'id' => $rel->id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
]
]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['app\models\MainUnits'],
    'active'  => true,
],[
    'content' => $this->blocks['Items'],
    'label'   => '<small>Items <span class="badge badge-default">'.count($model->getItems()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['SubUnits'],
    'label'   => '<small>Sub Units <span class="badge badge-default">'.count($model->getSubUnits()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
</div>
