<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderDetail $model */

$this->title = Yii::t('app', 'Create Order Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
