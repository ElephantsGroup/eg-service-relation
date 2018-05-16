<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use elephantsGroup\serviceRelation\models\ServiceRelation;
use elephantsGroup\serviceRelation\Module;
use elephantsGroup\jdf\Jdf;
/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceRelation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('service-relation', 'Service Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-relation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('service-relation', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('service-relation', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('service-relation', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'attribute'  => 'service1_id',
				'value'  => (isset($this->context->module->services[$model->service1_id])? $this->context->module->services[$model->service1_id] : Yii::t('service-relation', 'Deleted'))
			],
            'item1_id',
			[
				'attribute'  => 'service2_id',
				'value'  => (isset($this->context->module->services[$model->service2_id])? $this->context->module->services[$model->service2_id] : Yii::t('service-relation', 'Deleted'))
			],            
            'item2_id',
            'relation_type',
            'sort_order',
            [
				'attribute'  => 'status',
				'value'  => ServiceRelation::getStatus()[$model->status],
			],
			[
				'attribute'  => 'creation_time',
				'value'  => Jdf::jdate('Y/m/d H:i:s', (new \DateTime($model->creation_time))->getTimestamp(), '', 'Iran', 'en'),
			],
			[
				'attribute'  => 'update_time',
				'value'  => Jdf::jdate('Y/m/d H:i:s', (new \DateTime($model->update_time))->getTimestamp(), '', 'Iran', 'en'),
			],
        ],
    ]) ?>

</div>
