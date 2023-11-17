<?php

use app\modules\salers\models\Saleorder;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Saleorders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Saleorder'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'po_number',
            'customer_id',
            'salers_id',
            'deadline',
            'new_deadline',
            'payment_id',
            'percent_vat',
            'discount',
            'total',
            'grand_total',
            //'remask:ntext',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Saleorder $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
