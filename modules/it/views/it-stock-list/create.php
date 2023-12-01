<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockList $model */

$this->title = Yii::t('app', 'Create It Stock List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'It Stock Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-stock-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
