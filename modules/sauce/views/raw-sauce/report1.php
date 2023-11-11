<?php

use miloschuman\highcharts\Highcharts;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Report Select Type');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="report1">
    <?php Pjax::begin(); ?>
    <?php echo $this->render('report1Form', ['model' => $model]); ?>
    <div class="card border-info">
        <div class="card-header text-white bg-info">
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
                            'name' => 'pH',
                            'data' => $ph,
                        ],
                    ],
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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

    <div class="card border-info">
        <div class="card-header text-white bg-info">
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
    <?php Pjax::end(); ?>

</div>