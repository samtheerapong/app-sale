<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Saleorder $model */

$this->title = Yii::t('app', 'Update Sale Order: {name}', [
    'name' => $model->po_number,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->po_number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="saleorder-update">
    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
        'modelsPoItem' => $modelsPoItem,
    ]) ?>

</div>