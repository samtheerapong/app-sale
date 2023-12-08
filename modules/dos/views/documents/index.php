<?php

use app\modules\dos\models\Documents;
use app\modules\dos\models\Categories;
use app\modules\dos\models\Occupier;
use app\modules\dos\models\RawMaterial;
use app\modules\dos\models\Status;
use app\modules\dos\models\Types;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\ArrayHelper;

use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\DocumentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<meta http-equiv="refresh" content="360">
<div class="documents-index">

    <div style="display: flex; justify-content: space-between;">
        <div class="mb-3"> <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-danger']) ?></div>
        <div class="mb-3" style="text-align: right;">

            <?php
            // echo 
            // ExportMenu::widget([
            //     'exportConfig' => [
            //         ExportMenu::FORMAT_TEXT => false,
            //         ExportMenu::FORMAT_PDF => false,
            //         ExportMenu::FORMAT_HTML => false,
            //         ExportMenu::FORMAT_EXCEL => false,
            //         ExportMenu::FORMAT_EXCEL_X => false,
            //     ],
            //     'dataProvider' => $dataProvider,
            //     'columns' => [
            //         ['class' => 'yii\grid\SerialColumn'],
            //         // 'id',
            //         [
            //             'attribute' => 'categories_id',
            //             'format' => 'html',
            //             // 'contentOptions' => ['class' => 'text-center'],
            //             // 'options' => ['style' => 'width:120px;'],
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:' . $model->categories->color . ';"><b>' . $model->categories->name . '</b></span>';
            //             },
            //         ],
            //         [
            //             'attribute' => 'status_id',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:'
            //                     . $model->status->color . ';"><b>'
            //                     . $model->status->name
            //                     . ' </b></span>';
            //             },
            //         ],
            //         'status_details',
            //         'numbers',
            //         'title',
            //         'description:ntext',
            //         [
            //             'attribute' => 'expiration_date',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return Yii::$app->formatter->asDate($model->expiration_date, 'php:d M Y') .
            //                     ' <span class="badge" style="background-color: ' . ($model->getDaysToExpiration() < $model->document_date ? 'red' : 'green') . ';">' . $model->getDaysToExpiration() . ' days left</span>';
            //             },
            //         ],
            //         [
            //             'attribute' => 'raw_material',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:'
            //                     . $model->rawMaterial->color . ';"><b>'
            //                     . $model->rawMaterial->name
            //                     . ' </b></span>';
            //             },
            //         ],
            //         [
            //             'attribute' => 'categories_id',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:'
            //                     . $model->categories->color . ';"><b>'
            //                     . $model->categories->name
            //                     . ' </b></span>';
            //             },
            //         ],

            //         [
            //             'attribute' => 'occupier_id',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:'
            //                     . $model->occupier->color . ';"><b>'
            //                     . $model->occupier->name
            //                     . ' </b></span>';
            //             },
            //         ],
            //         'supplier_name',
            //         [
            //             'attribute' => 'types_id',
            //             'format' => 'html',
            //             'value' => function ($model) {
            //                 return '<span class="badge" style="background-color:'
            //                     . $model->types->color . ';"><b>'
            //                     . $model->types->name
            //                     . ' </b></span>';
            //             },
            //         ],

            //     ],

            // ]); 
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                // 'options' => ['class' => 'table-responsive'],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center m-1'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:45px;'], //กำหนด ความกว้างของ #
                    ],

                    [
                        'attribute' => 'categories_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->categories->color . ';"><b>' . $model->categories->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'categories_id',
                            'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'title',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:250px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:250px;'],
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->title, 0, 22, 'UTF-8');
                            if (mb_strlen($model->title, 'UTF-8') > 22) {
                                $truncatedSupplierName .= '...';
                            }

                            $tooltipContent = $model->title;
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
                            'attribute' => 'title',
                            'data' => ArrayHelper::map(Documents::find()->all(), 'title', 'title'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'occupier_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->occupier->color . ';"><b>' . $model->occupier->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'occupier_id',
                            'data' => ArrayHelper::map(Occupier::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'supplier_name',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:250px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:250px;'],
                        'format' => 'html',
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->supplier_name, 0, 22, 'UTF-8');
                            if (mb_strlen($model->supplier_name, 'UTF-8') > 22) {
                                $truncatedSupplierName .= '...';
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
                            'data' => ArrayHelper::map(Documents::find()->all(), 'supplier_name', 'supplier_name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'raw_material',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->rawMaterial->color . ';"><b>' . $model->rawMaterial->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'raw_material',
                            'data' => ArrayHelper::map(RawMaterial::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'types_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->types->color . ';"><b>' . $model->types->name . '</b></span>';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'types_id',
                            'data' => ArrayHelper::map(Types::find()->all(), 'id', 'name'),
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
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:80px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:80px;'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->getDaysToExpirationValue();
                        },
                        'filter' => false
                    ],

                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
                        'value' => function ($model) {
                            $badge = '<span class="badge badge-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" title="' . $model->status_details . '" style="background-color:'
                                . $model->status->color . '; color: white;"><b>'
                                . $model->status->name
                                . ' </b></span>';

                            $link = Html::a($badge, ['view', 'id' => $model->id]);

                            return $link;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'status_id',
                            'data' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width: 140px;'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, Documents $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


            <!-- </div> -->
        </div>
    </div>
</div>