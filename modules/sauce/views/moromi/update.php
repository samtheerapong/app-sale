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
        <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary btn-lg']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-eye"></i> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-warning btn-lg']) ?>
            <?= Html::a('<i class="fas fa-list"></i> ' . Yii::t('app', 'Add List of Memo'), ['item', 'id' => $model->id], ['class' => 'btn btn-info btn-lg']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-lg',
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