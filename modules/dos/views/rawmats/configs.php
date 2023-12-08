<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\dos\models\Rawmats $model */

\yii\web\YiiAsset::register($this);
$this->title = Yii::t('app', 'Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rawmats-configs">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Raw Material'), ['/qc/rawmats/index'], ['class' => 'btn btn-primary']) ?>
        </p>
        <p style="text-align: right;">
        </p>
    </div>

    <div class="card border-success">
        <div class="card-header text-white bg-success">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Raw Material Category') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Raw Material Category'), ['/qc/rawmat-category/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Raw Material Status') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Raw Material Status'), ['/qc/rawmat-status/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>