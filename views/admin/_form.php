<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use elephantsGroup\serviceRelation\models\ServiceRelation;
use elephantsGroup\serviceRelation\Module;

/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceRelation */
/* @var $form yii\widgets\ActiveForm */
//$module = \Yii::$app->getModule('service-relastion');
?>

<div class="service-relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service1_id')->dropDownList($this->context->module->services, ['prompt' => Yii::t('service-relation', 'Select Service ...')]) ?>

    <?= $form->field($model, 'item1_id')->textInput() ?>

    <?= $form->field($model, 'service2_id')->dropDownList($this->context->module->services, ['prompt' => Yii::t('service-relation', 'Select Service ...')]) ?>

    <?= $form->field($model, 'item2_id')->textInput() ?>

    <?= $form->field($model, 'relation_type')->dropDownList(ServiceRelation::getServiceTypes(), ['prompt' => Yii::t('service-relation', 'Select Service Type ...')]) ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(ServiceRelation::getStatus(), ['prompt' => Yii::t('service-relation', 'Select Status ...')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('service-relation', 'Create') : Yii::t('service-relation', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
