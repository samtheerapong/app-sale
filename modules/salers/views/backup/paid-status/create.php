<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\PaidStatus $model */

$this->title = Yii::t('app', 'Create Paid Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paid Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paid-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
