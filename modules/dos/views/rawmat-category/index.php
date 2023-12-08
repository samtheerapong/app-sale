<?php

use app\modules\dos\models\RawmatCategory;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\RawmatCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Raw Material Category');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawmat-category-index">
    <div style="display: flex; justify-content: space-between;">
        <div class="mb-3">
            <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Raw Material'), ['/qc/rawmats/index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-danger']) ?>
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
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // 'code',
                    [
                        'attribute' => 'code',
                        'format' => 'html',
                        // 'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            $codevalue = $model->code;
                            return Html::a(
                                $codevalue,
                                ['view', 'id' => $model->id],
                            );
                        },
                    ],
                    // 'name',
                    [
                        'attribute' => 'name',
                        'format' => 'html',
                        // 'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->name, 0, 30, 'UTF-8');
                            if (mb_strlen($model->name, 'UTF-8') > 30) {
                                $truncatedSupplierName .= '...';
                            }

                            $tooltipContent = $model->name;
                            $tooltipLink = '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="' . $tooltipContent . '">'
                                . $truncatedSupplierName
                                . '</span>';
                            return  $tooltipLink;
                            // return Html::a(
                            //     $tooltipLink,
                            //     ['view', 'id' => $model->id],
                            // );
                        },
                    ],
                    // 'details:ntext',
                    [
                        'attribute' => 'details',
                        'format' => 'html',
                        'value' => function ($model) {
                            $truncatedSupplierName = mb_substr($model->details, 0, 45, 'UTF-8');
                            if (mb_strlen($model->details, 'UTF-8') > 45) {
                                $truncatedSupplierName .= '...';
                            }
                            $tooltipContent = $model->details;
                            $tooltipLink = '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="' . $tooltipContent . '">'
                                . $truncatedSupplierName
                                . '</span>';
                            return  $tooltipLink;
                            // return Html::a(
                            //     $tooltipLink,
                            //     ['view', 'id' => $model->id],
                            // );
                        },
                    ],
                    // 'color',
                    [
                        'attribute' => 'color',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->color . ';"><b>' . $model->color . '</b></span>';
                        },
                    ],
                    [
                        // 'class' => ActionColumn::class,
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'จัดการ',
                        'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                        'buttonOptions' => ['class' => 'btn btn-outline-success btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action,  $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>