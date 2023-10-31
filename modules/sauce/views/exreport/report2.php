<?php

use app\modules\sauce\models\Tank;
use app\modules\sauce\models\Type;
use kartik\widgets\Select2;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Report Charts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="report1">
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Report Selector') ?>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'tank_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Tank::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'type_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Type::find()->all(), 'id', 'code'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-3">

                    <?= $form->field($model, 'mm')->dropDownList([
                        '' => '',
                        '1' => 'มกราคม',
                        '2' => 'กุมภาพันธ์',
                        '3' => 'มีนาคม',
                        '4' => 'เมษายน',
                        '5' => 'พฤษภาคม',
                        '6' => 'มิถุนายน',
                        '7' => 'กรกฎาคม',
                        '8' => 'สิงหาคม',
                        '9' => 'กันยายน',
                        '10' => 'ตุลาคม',
                        '11' => 'พฤศจิกายน',
                        '12' => 'ธันวาคม',
                    ])->label(Yii::t('app', 'Month')); ?>
                </div>

                <div class="col-md-3">

                    <?= $form->field($model, 'yy')->dropDownList([
                        '' => '',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                        // '2026' => '2026',
                        // '2027' => '2027',
                        // '2028' => '2028',
                        // '2029' => '2029',
                        // '2030' => '2030',
                        // '2031' => '2031',
                        // '2032' => '2032',

                    ])->label(Yii::t('app', 'Month')); ?>
                </div>


                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-area-chart" aria-hidden="true"></i> ' . Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>



    <!-- Display the chart below the form -->
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
                        'categories' => $mm
                    ],
                    'yAxis' => [
                        'title' => ['text' => Yii::t('app', 'Value')]
                    ],
                    'series' => [
                        [
                            'type' => 'line',
                            'name' => '%',
                            'data' => $ph,
                        ]
                    ]
                ]
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