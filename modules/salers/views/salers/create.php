<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\salers\models\Salers $model */

$this->title = Yii::t('app', 'Create Salers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salers-create">

<p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
