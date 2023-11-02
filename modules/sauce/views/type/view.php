<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Type $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-view">

    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
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

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    <?= $this->title ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            // 'id',
                            'code',
                            'name',
                            'description',
                            // 'color',
                            [
                                'attribute' => 'color',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return
                                        '<h4><span class="badge" style="background-color:' . $model->color . '; color: #FFFFFF;"><b>' . $model->color . '</b></span></h4>';
                                },
                            ],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>