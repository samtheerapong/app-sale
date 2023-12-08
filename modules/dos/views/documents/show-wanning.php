<?php

use app\modules\dos\models\Categories;
use app\modules\dos\models\Occupier;
use app\modules\dos\models\RawMaterial;
use app\modules\dos\models\Status;
use app\modules\dos\models\Types;
use app\modules\dos\models\Documents;

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Documents Expiring Soon');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="documents-show-wanning">



    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::button('<i class="fas fa-share"></i> ' . Yii::t('app', 'Share'), ['class' => 'btn btn-secondary', 'id' => 'copy-button']) ?>
        </p>
        <div class="mb-3" style="text-align: right;">

            <?php
            echo ExportMenu::widget([
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    // ExportMenu::FORMAT_EXCEL_X => false,
                ],
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'categories_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->categories->color . ';"><b>' . $model->categories->name . '</b></span>';
                        },
                    ],

                    [
                        'attribute' => 'title',
                        'format' => 'html',
                        'value' => function ($model) {
                            $model->title;
                        },

                    ],

                    [
                        'attribute' => 'occupier_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->occupier->color . ';"><b>' . $model->occupier->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'supplier_name',
                        'format' => 'html',
                        'value' => function ($model) {
                            $model->supplier_name;
                        },

                    ],

                    [
                        'attribute' => 'raw_material',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->rawMaterial->color . ';"><b>' . $model->rawMaterial->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'types_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->types->color . ';"><b>' . $model->types->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'expiration_date',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Yii::$app->formatter->asDate($model->expiration_date, 'php:d M Y');
                        },
                    ],
                    [
                        'attribute' => 'expiration_date',
                        'label' => Yii::t('app', 'Days left'),
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->getDaysToExpirationValue();
                        },
                        'filter' => false
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <?php $currentUrl = Yii::$app->request->absoluteUrl; ?>
    <script>
        document.getElementById('copy-button').addEventListener('click', function() {
            var textArea = document.createElement('textarea');
            textArea.value = '<?= $currentUrl ?>';
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                alert('URL copied to clipboard.');
            } catch (err) {
                console.error('Unable to copy URL: ', err);
            }
            document.body.removeChild(textArea);
        });
    </script>


    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center m-1'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'categories_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        // 'options' => ['style' => 'width:120px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->categories->color . ';"><b>' . $model->categories->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'title',
                        // 'options' => ['style' => 'width:250px;'],
                        'format' => 'html',
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

                    ],

                    [
                        'attribute' => 'occupier_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        // 'options' => ['style' => 'width:80px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->occupier->color . ';"><b>' . $model->occupier->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'supplier_name',
                        // 'options' => ['style' => 'width:250px;'],
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

                    ],

                    [
                        'attribute' => 'raw_material',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        // 'options' => ['style' => 'width:130px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->rawMaterial->color . ';"><b>' . $model->rawMaterial->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'types_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'],
                        // 'options' => ['style' => 'width:130px;'],
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->types->color . ';"><b>' . $model->types->name . '</b></span>';
                        },

                    ],

                    [
                        'attribute' => 'expiration_date',
                        // 'label' => Yii::t('app', 'Days left'),
                        // 'options' => ['style' => 'width:150px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return Yii::$app->formatter->asDate($model->expiration_date, 'php:d M Y');
                        },
                    ],
                    [
                        'attribute' => 'expiration_date',
                        'label' => Yii::t('app', 'Days left'),
                        // 'options' => ['style' => 'width:80px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->getDaysToExpirationValue();
                        },
                        'filter' => false
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        // 'headerOptions' => ['style' => 'width: 100px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update}</div>',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>

    <div class="row mt-2">
        <p><b><u><?= Yii::t('app', 'Note') ?></u></b> <?= Yii::t('app', 'Show documents less than 60 days old') ?></p>
    </div>

</div>