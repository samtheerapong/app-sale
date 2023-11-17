<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\SaleItem $model */

$this->title = Yii::t('app', 'Create Sale Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
