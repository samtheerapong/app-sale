<?php
$this->title = 'Chart';
$this->params['breadcrumbs'][] = $this->title;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
?>
<!-- ส่วนแสดงกราฟ -->
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-signal"></i>
            report</h3>
    </div>
    <div class="panel-body">
        <?php
        echo Highcharts::widget([
            'options' => [
                'title' => ['text' => 'จำนวนผู้ป่วยในแยกรายเดือน'],
                'xAxis' => [
                    'categories' => $mm
                ],
                'yAxis' => [
                    'title' => ['text' => 'จำนวน(คน)']
                ],
                'series' => [
                    [
                        'type' => 'line',
                        'name' => 'CNT',
                        'data' => $cnt,
                    ]
                ]
            ]
        ]);
        ?>
    </div>
</div>
