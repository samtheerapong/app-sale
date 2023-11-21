<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MinimumConfig $model */

$this->title = Yii::t('app', 'Create Minimum Config');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Minimum Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minimum-config-create">
    <p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>