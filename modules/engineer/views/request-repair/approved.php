<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */

$this->title = Yii::t('app', 'Approve') . ' : ' .$model->repair_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Approve');
?>
<div class="request-repair-approve">


    <?= $this->render('_approve', [
        'model' => $model,
    ]) ?>

</div>