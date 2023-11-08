<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */

$this->title = Yii::t('app', 'New Request');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Repair'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-repair-create">

<p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>