<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Type $model */

$this->title = Yii::t('app', 'Create New');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
