<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */

$this->title = Yii::t('app', 'Update') . ' : ' . $model->repair_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Repair'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="request-repair-update">

<p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview' => $initialPreview,
        'initialPreviewConfig' => $initialPreviewConfig
    ]) ?>

</div>