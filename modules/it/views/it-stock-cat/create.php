<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\it\models\ItStockCat $model */

$this->title = Yii::t('app', 'Create It Stock Cat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'It Stock Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-stock-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
