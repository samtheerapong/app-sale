<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AutoNumber $model */

$this->title = Yii::t('app', 'Update Auto Number: {name}', [
    'name' => $model->group,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group, 'url' => ['view', 'group' => $model->group]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auto-number-update">

    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>