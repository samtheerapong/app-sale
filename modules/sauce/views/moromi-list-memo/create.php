<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\MoromiListMemo $model */

$this->title = Yii::t('app', 'Create Moromi List Memo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi List Memo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moromi-list-memo-create">

   
<p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
