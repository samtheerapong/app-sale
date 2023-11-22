<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\Moromi $model */

$this->title = Yii::t('app', 'Update') . ' : ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moromi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="moromi-update">

    

    <div style="display: flex; justify-content: space-between;">
        <p>
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), 'javascript:history.back()', ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">
        <?= Html::a('<i class="fas fa-list"></i> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        // 'modelsItem' => $modelsItem,
    ]) ?>

</div>