<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\qc\models\Rawmats $model */

$this->title = Yii::t('app', '{name}', [
    'name' => $model->numbers,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Raw Material'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numbers, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rawmats-update">
    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>