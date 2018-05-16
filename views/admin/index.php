<?php

use yii\helpers\Html;
use yii\grid\GridView;
use elephantsGroup\serviceRelation\models\ServiceRelation;
use elephantsGroup\serviceRelation\Module;
use elephantsGroup\jdf\Jdf;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ServiceRelationQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('service-relation', 'Service Relations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-relation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('service-relation', 'Create Service Relation'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
                'attribute' => 'service1_id',
                'value' => function($model){
                    if(isset($this->context->module->services[$model->service1_id]))
						return $this->context->module->services[$model->service1_id];
					else
						return Yii::t('service-relation', 'Deleted');
                },
                'filter' => Html::activeDropDownList($searchModel, 'service1_id', $this->context->module->services, ['class' => 'form-control', 'prompt' => Yii::t('service-relation', 'Select Service ...')])
			],
            'item1_id',
            
			[
                'attribute' => 'service2_id',
                'value' => function($model){
                    if(isset($this->context->module->services[$model->service2_id]))
						return $this->context->module->services[$model->service2_id];
					else
						return Yii::t('service-relation', 'Deleted');
                },
                'filter' => Html::activeDropDownList($searchModel, 'service2_id', $this->context->module->services, ['class' => 'form-control', 'prompt' => Yii::t('service-relation', 'Select Service ...')])
			],
            'item2_id',
			[
                'attribute' => 'status',
                'value' => function($model){
                    return ServiceRelation::getStatus()[$model->status];
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', ServiceRelation::getStatus(), ['class' => 'form-control', 'prompt' => Yii::t('service-relation', 'Select Status ...')])
            ],
            // 'relation_type',
            // 'sort_order',
            // 'update_time',
            // 'creation_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
