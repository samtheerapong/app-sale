<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Products $model */

$this->title = $model->sku;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h3><?= Yii::t('app', 'Detail of') . ' : ' .  Html::encode($this->title) ?></h3>

    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>
        <p style="text-align: right;">
            <?= Html::button('<i class="fas fa-share"></i> ' . Yii::t('app', 'Share'), ['class' => 'btn btn-info', 'id' => 'copy-button']) ?>
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
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    'id',
                    'sku',
                    'name',
                    'unit',
                    'image:ntext',
                    'description:ntext',
                    'active',
                ],
            ]) ?>

        </div>
    </div>
</div>


<!-- script copy-button  Share -->
<?php $currentUrl = Yii::$app->request->absoluteUrl; ?>
<script>
    document.getElementById('copy-button').addEventListener('click', function() {
        var textArea = document.createElement('textarea');
        textArea.value = '<?= $currentUrl ?>';
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand('copy');
            // alert('URL copied to clipboard.');
            alert(`<?= Yii::t('app', 'URL copied to clipboard.') ?>`);
        } catch (err) {
            console.error('Unable to copy URL: ', err);
        }
        document.body.removeChild(textArea);
    });
</script>