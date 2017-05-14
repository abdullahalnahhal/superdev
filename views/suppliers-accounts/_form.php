<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\SuppliersAccounts $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="suppliers-accounts-form">

    <?php $form = ActiveForm::begin([
    'id' => 'SuppliersAccounts',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
$form->field($model, 'suppliers_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\Suppliers::find()->all(), 'id', 'name'),
    ['prompt' => 'Select']
); ?>
			<?= $form->field($model, 'dept')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'credit')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => Yii::t('app', StringHelper::basename('app\models\SuppliersAccounts')),
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
