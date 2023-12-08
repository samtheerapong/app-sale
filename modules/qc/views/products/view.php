<?php

use yii2assets\printthis\PrintThis;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\qc\models\Products $model */

$this->title = $model->numbers;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::button('<i class="fas fa-share"></i> ' . Yii::t('app', 'Share'), ['class' => 'btn btn-secondary', 'id' => 'copy-button']) ?>
        </p>

        <p style="text-align: right;">

            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>

        <div id="PrintThis">

            <div class="card-body">
                <div class="col-md-12">
                    <div class="<?= $model->getDaysToExpiration() <= 0 ? 'alert alert-danger' : 'alert alert-success' ?>">
                        <?php if ($model->getDaysToExpiration() <= 0) : ?>
                            <?= Yii::t('app', 'This document has expired.') ?> <?= $model->getDaysToExpiration() ?> <?= Yii::t('app', 'Days') ?>
                        <?php else : ?>
                            <?= Yii::t('app', 'This document will expire in') ?> <?= $model->getDaysToExpiration() ?> <?= Yii::t('app', 'Days') ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th style="width: 300px;">{label}</th><td> {value}</td></tr>',
                    'attributes' => [
                        // 'id',
                        'numbers',
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                $badge = '<span class="badge badge-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" title="' . $model->status_details . '" style="background-color:'
                                    . $model->productStatus->color . '; color: white;"><b>'
                                    . $model->productStatus->name
                                    . ' </b></span>';

                                // $link = Html::a($badge, ['view', 'id' => $model->id]);

                                return $badge;
                            },
                        ],
                        'status_details:ntext',
                        'title',
                        'description:ntext',
                        [
                            'attribute' => 'category',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->productCategory->color . ';"><b>' . $model->productCategory->code . '</b></span>';
                            },
                        ],
                        'product_name',
                        // 'revision',
                        [
                            'attribute' => 'revision',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->revision;
                            },
                        ],
                        'reviesed_date:date',
                        // 'product_iso:ntext',
                        [
                            'attribute' => 'product_iso',
                            'value' => function ($model) {
                                return $model->ProductIsoName;
                            }
                        ],


                        [
                            'attribute' => 'docs',
                            'format' => 'html',
                            'value' => $model->listDownloadFiles('docs')
                        ],
                        'expiration_date:date',
                        [
                            'attribute' => 'expiration_date',
                            'label' => Yii::t('app', 'Days left'),
                            'options' => ['style' => 'width:80px;'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->getDaysToExpirationValue();
                            },
                        ],
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>


<?php $currentUrl = Yii::$app->request->absoluteUrl; ?>
<script>
    document.getElementById('copy-button').addEventListener('click', function() {
        var textArea = document.createElement('textarea');
        textArea.value = '<?= $currentUrl ?>';
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand('copy');
            alert('URL copied to clipboard.');
        } catch (err) {
            console.error('Unable to copy URL: ', err);
        }
        document.body.removeChild(textArea);
    });
</script>