<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItem $model */

$this->title = Yii::t('app', 'Create Sales details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-item-create">
    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>