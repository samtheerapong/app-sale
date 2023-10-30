<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauce $model */

$this->title = Yii::t('app', 'Create Raw Sauce');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Raw Sauces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-sauce-create">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
