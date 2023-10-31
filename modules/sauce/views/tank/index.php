<?php

use app\modules\sauce\models\Tank;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\TankSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tank');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'code',
                    'name',
                    // 'description',
                    'color',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width: 120px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
</div>