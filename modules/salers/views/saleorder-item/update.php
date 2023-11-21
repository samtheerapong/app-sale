<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItem $model */

$this->title = Yii::t('app', 'Update Saleorder Item: {name}', [
    'name' =>  $model->saleoder->po_number.' : '. Yii::$app->formatter->asDate($model->saleoder->deadline),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->saleoder->po_number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="saleorder-item-update">
<p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
