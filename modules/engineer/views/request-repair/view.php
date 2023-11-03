<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-repair-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'repair_code',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'priority',
            'urgency',
            'created_date',
            'request_department',
            'request_title',
            'request_detail:ntext',
            'request_date',
            'broken_date',
            'locations_id',
            'remask:ntext',
            'images:ntext',
            'approver',
            'approve_date',
            'approve_comment:ntext',
            'job_status_id',
            'ref',
        ],
    ]) ?>

</div>
