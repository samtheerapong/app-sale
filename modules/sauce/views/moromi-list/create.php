<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiList $model */

$this->title = Yii::t('app', 'Create Moromi List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
