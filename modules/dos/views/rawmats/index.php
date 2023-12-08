<?php

use app\modules\dos\models\RawmatCategory;
use app\modules\dos\models\Rawmats;
use app\modules\dos\models\RawmatStatus;
use kartik\export\ExportMenu;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\RawmatsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Material');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawmats-index">
    <div style="display: flex; justify-content: space-between;">
        <div class="mb-3"> <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Data'), ['create'], ['class' => 'btn btn-danger']) ?></div>
        <div class="mb-3" style="text-align: right;">

            <?php
            echo ExportMenu::widget([
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_EXCEL_X => false,
                ],
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <div class="card border-success">
        <div class="card-header text-white bg-success">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center m-1'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'numbers',
                        'format' => 'html',
                        'options' => ['style' => 'width:150px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return Html::a($model->numbers, ['view', 'id' => $model->id]);
                        },
                    ],
                    // [
                    //     'attribute' => 'title',
                    //     'format' => 'html',
                    //     'options' => ['style' => 'width:300px;'],
                    //     'value' => function ($model) {
                    //         $truncatedSupplierName = mb_substr($model->title, 0, 30, 'UTF-8');
                    //         if (mb_strlen($model->title, 'UTF-8') > 30) {
                    //             $truncatedSupplierName .= '...';
                    //         }

                    //         $tooltipContent = $model->title;
                    //         $tooltipLink = '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="' . $tooltipContent . '">'
                    //             . $truncatedSupplierName
                    //             . '</span>';

                    //         return Html::a(
                    //             $tooltipLink,
                    //             ['view', 'id' => $model->id],
                    //         );
                    //     },
                    //     'filter' => Select2::widget([
                    //         'model' => $searchModel,
                    //         'attribute' => 'title',
                    //         'data' => ArrayHelper::map(Rawmats::find()->all(), 'title', 'title'),
                    //         'options' => ['placeholder' => Yii::t('app', 'Select...')],
                    //         'language' => 'th',
                    //         'pluginOptions' => [
                    //             'allowClear' => true
                    //         ],
                    //     ])
                    // ],
                    // 'description:ntext',
                    
                    [
                        'attribute' => 'rawmat_name',
                        'format' => 'html',
                        'options' => ['style' => 'width:300px;'],
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->rawmat_name, 0, 30, 'UTF-8');
                            if (mb_strlen($model->rawmat_name, 'UTF-8') > 30) {
                                $truncatedSupplierName .= '..';
                            }
                            $tooltipContent = $model->rawmat_name;
                            $tooltipLink = '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="' . $tooltipContent . '">'
                                . $truncatedSupplierName
                                . '</span>';

                            return Html::a(
                                $tooltipLink,
                                ['view', 'id' => $model->id],
                            );
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'rawmat_name',
                            'data' => ArrayHelper::map(Rawmats::find()->all(), 'rawmat_name', 'rawmat_name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    
                    [
                        'attribute' => 'supplier_name',
                        'format' => 'html',
                        'options' => ['style' => 'width:300px;'],
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->supplier_name, 0, 30, 'UTF-8');
                            if (mb_strlen($model->supplier_name, 'UTF-8') > 30) {
                                $truncatedSupplierName .= '..';
                            }
                            $tooltipContent = $model->supplier_name;
                            $tooltipLink = '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="' . $tooltipContent . '">'
                                . $truncatedSupplierName
                                . '</span>';

                            return Html::a(
                                $tooltipLink,
                                ['view', 'id' => $model->id],
                            );
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'supplier_name',
                            'data' => ArrayHelper::map(Rawmats::find()->all(), 'supplier_name', 'supplier_name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'category',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->rawmatCategory->color . ';"><b>' . $model->rawmatCategory->code . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'category',
                            'data' => ArrayHelper::map(RawmatCategory::find()->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            $badge = '<span class="badge badge-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" title="' . $model->status_details . '" style="background-color:'
                                . $model->rawmatStatus->color . '; color: white;"><b>'
                                . $model->rawmatStatus->name
                                . ' </b></span>';

                            $link = Html::a($badge, ['view', 'id' => $model->id]);

                            return $link;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status',
                            'data' => ArrayHelper::map(RawmatStatus::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'expiration_date',
                        'label' => Yii::t('app', 'Days left'),
                        'contentOptions' => ['class' => 'text-center'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->getDaysToExpirationValue();
                        },
                        'filter' => false
                    ],
                    //'docs:ntext',
                    //'expiration_date',
                    //'status',
                    //'status_details:ntext',
                    //'ref',
                    //'created_at',
                    //'updated_at',
                    //'created_by',
                    //'updated_by',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'contentOptions' => ['class' => 'text-center'],
                        // 'buttonOptions' => ['class' => 'btn btn-sm btn-outline-primary btn-group'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, Rawmats $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>