<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */

$this->title = Yii::t('app', 'Sale Item') . ' : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="moromi-update">

    <p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_item', [
        'model' => $model,
        'modelsItem' => $modelsItem,
    ]) ?>

</div>