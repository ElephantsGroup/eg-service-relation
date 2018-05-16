<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceRelation */

$this->title = Yii::t('service-relation', 'Update {modelClass}: ', [
    'modelClass' => 'Service Relation',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('service-relation', 'Service Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('service-relation', 'Update');
?>
<div class="service-relation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
