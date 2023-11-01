<?php

use app\modules\sauce\models\Tank;
use app\modules\sauce\models\Type;
use kartik\widgets\Select2;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Report Charts');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="report1">


    <div class="report1">
        <?php  echo $this->render('reportForm', ['model' => $model]); ?>
        <!-- Display the chart below the form -->
        <!-- Your chart display code here -->
    </div>


    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'pH Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'pH Charts')],
                    'xAxis' => [
                        'categories' => $mm,
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')],
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => 'pH', // Change this name to reflect the data being plotted
                            'data' => $ph,
                        ],
                    ],
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'NaCl Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'NaCl Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $nacl,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'TN Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'TN Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $tn,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Color Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'Color Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $col,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Alcohol Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'Alcohol Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $alc,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Turbidity Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'Turbidity Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => 'ppm',
                            'data' => $ppm,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Blix Charts') ?>
        </div>
        <div class="card-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => Yii::t('app', 'Blix Charts')],
                    'xAxis' => [
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $brix,
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>