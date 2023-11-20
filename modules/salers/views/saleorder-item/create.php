<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleorderItem $model */

$this->title = Yii::t('app', 'Create Sales details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
