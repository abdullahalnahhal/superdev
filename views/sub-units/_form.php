<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\SubUnits $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="sub-units-form">

    <?php $form = ActiveForm::begin([
    'id' => 'SubUnits',
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
$form->field($model, 'units_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\Units::find()->all(), 'id', 'id'),
    ['prompt' => 'Select']
); ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
$form->field($model, 'main_unit_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\MainUnits::find()->all(), 'id', 'id'),
    ['prompt' => 'Select']
); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => Yii::t('app', StringHelper::basename('app\models\SubUnits')),
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

