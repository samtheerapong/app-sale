<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\TankDestination $model */

$this->title = Yii::t('app', 'Create Tank Destination');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tank Destinations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-destination-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
