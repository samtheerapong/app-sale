<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleProductUnit $model */

$this->title = Yii::t('app', 'Create Sale Product Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Product Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-product-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
