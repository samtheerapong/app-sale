<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\qc\models\RawmatStatus $model */

$this->title = Yii::t('app', 'Create Rawmat Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rawmat Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawmat-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
