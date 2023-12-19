<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStock $model */

$this->title = Yii::t('app', 'Create It Stock');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'It Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-stock-create">
    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>