<?php

use app\models\PoItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PoItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Po Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-item-index">
    <div class="card border-info">
        <div class="card-header text-white bg-info">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'po_item_no',
                        'quantity',
                        // 'po_id',

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>