<?php

use yii\helpers\Html;
\yii\web\YiiAsset::register($this);
$this->title = Yii::t('app', 'Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="products-configs">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Documents'), ['/documents/index'], ['class' => 'btn btn-primary']) ?>
        </p>
        <p style="text-align: right;">
        </p>
    </div>
   
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Categories') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Categories'), ['/categories/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Occupier') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Occupier'), ['/occupier/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Types') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Types'), ['/types/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Statuses') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Statuses'), ['/status/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Raw Material') ?></div>
                        <div class="card-body text-success">
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Raw Material'), ['/raw-material/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>