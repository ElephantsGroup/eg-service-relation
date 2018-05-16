<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceRelation */

$this->title = Yii::t('service-relation', 'Create Service Relation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('service-relation', 'Service Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
