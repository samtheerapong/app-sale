<?php
$this->title = ' ค่า PH';
$this->params['breadcrumbs'][] = $this->title;

use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
?>
<!-- ส่วนแสดงกราฟ -->
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-signal"></i>
            ค่า PH
        </h3>
    </div>
    <div class="panel-body">
        <?php
        echo Highcharts::widget([
            'options' => [
                'title' => ['text' => ' ค่า PH'],
                'xAxis' => [
                    'categories' => $mm
                ],
                'yAxis' => [
                    'title' => ['text' => 'ค่า']
                ],
                'series' => [
                    [
                        'type' => 'line',
                        'name' => 'PH',
                        'data' => $ph,
                    ]
                ]
            ]
        ]);
        ?>
    </div>
</div>