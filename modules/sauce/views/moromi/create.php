<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */

$this->title = Yii::t('app', 'Create Moromi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-create">

    <p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary btn-lg']) ?>
    </p>


    <?= $this->render('_form', [
        'model' => $model,
        'modelsItem' => $modelsItem,
    ]) ?>

</div>