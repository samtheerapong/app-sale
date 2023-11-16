<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleCustomer $model */

$this->title = Yii::t('app', 'Create Sale Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Customer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-customer-create">
    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>