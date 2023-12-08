<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\RawmatCategory $model */

$this->title = Yii::t('app', 'Create Rawmat Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rawmat Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawmat-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
