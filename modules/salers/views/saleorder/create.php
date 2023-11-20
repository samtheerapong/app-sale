<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Saleorder $model */

$this->title = Yii::t('app', 'Create Sale Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleorder-create">

    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
        'modelItems' => $modelItems
    ]) ?>

</div>