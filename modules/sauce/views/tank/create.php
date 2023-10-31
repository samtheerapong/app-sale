<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Tank $model */

$this->title = Yii::t('app', 'Create New');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tank'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
