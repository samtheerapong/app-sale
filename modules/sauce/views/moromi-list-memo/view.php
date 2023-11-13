<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiListMemo $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi List Memos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="moromi-list-memo-view">

    <div style="display: flex; justify-content: space-between;">
        <p>
            <!-- <?= Html::a('<i class="fas fa-calendar"></i> ' . Yii::t('app', 'Record Card'), ['index2'], ['class' => 'btn btn-primary']) ?> -->
            <?= Html::a('<i class="fas fa-home"></i> ' . Yii::t('app', 'Home'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>
    <div class="card border-secondary">
        <div class="card-header" style="background-color: <?= $model->color ?>; color: #fff;">
            <?= Yii::t('app', 'Moromi') ?>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    'name',
                    'detail:ntext',
                    'color',
                    // 'active',
                    [
                        'attribute' => 'active',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->active === 1
                                ? '<span class="text" style="color: #1A5D1A">' . Yii::t('app', 'Active') . '</span>'
                                : '<span class="text" style="color: #FE0000">' . Yii::t('app', 'Inactive') . '</span>';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>