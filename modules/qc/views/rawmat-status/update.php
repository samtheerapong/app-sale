<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\qc\models\RawmatStatus $model */

$this->title = Yii::t('app', 'Update Rawmat Status: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rawmat Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rawmat-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
