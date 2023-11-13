<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\TankSource $model */

$this->title = Yii::t('app', 'Create Tank Source');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tank Sources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
