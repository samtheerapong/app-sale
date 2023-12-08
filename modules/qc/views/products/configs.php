<?php

use yii2assets\printthis\PrintThis;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\qc\models\Products $model */

\yii\web\YiiAsset::register($this);
$this->title = Yii::t('app', 'Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="products-configs">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-table"></i> ' . Yii::t('app', 'Products'), ['/qc/products/index'], ['class' => 'btn btn-primary']) ?>
        </p>
        <p style="text-align: right;">
        </p>
    </div>

    <div class="card border-primary">
        <div class="card-header text-white bg-primary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Product Category') ?></div>
                        <div class="card-body text-success">
                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Product Category'), ['/qc/product-category/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Product Iso') ?></div>
                        <div class="card-body text-success">
                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Product Iso'), ['/qc/product-iso/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-success mb-3">
                        <div class="card-header"><?= Yii::t('app', 'Product Status') ?></div>
                        <div class="card-body text-success">
                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                            <?= Html::a('<i class="fas fa-cog"></i> ' . Yii::t('app', 'Product Status'), ['/qc/product-status/index'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>