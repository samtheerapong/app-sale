<?php


use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\sauce\models\RawSauceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Request Repair');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="request-repair-index">
    <p>
        <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Create New Request'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?= $this->render('_search', ['model' => $searchModel]); ?>
            </div>
            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="card mb-2">
                            <div class="card-header" style="background-color: <?= $model->jobStatus->color ?>; color: #fff;">
                                <a href="<?= Url::toRoute(['view', 'id' => $model->id]); ?>" class="link-light">
                                    <h5>
                                        <?= Html::encode($model->repair_code) ?>
                                        <?php if ($model->urgency == 3) : ?>
                                            <span class="badge" style="background-color: <?= $model->urgency0->color ?>; color: #fff;">
                                                <?= Html::encode($model->urgency0->name) ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($model->priority == 3) : ?>
                                            <span class="badge badge-blink" style="background-color: <?= $model->priority0->color ?>; color: #fff;">
                                                <?= Html::encode($model->priority0->name) ?>
                                            </span>
                                        <?php endif; ?>
                                    </h5>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><b><?= Yii::t('app', 'Request Date') ?></b> : <?= Html::encode(Yii::$app->formatter->asDate($model->request_date, 'dd MMMM YYYY')) ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Title') ?></b> : <?= Html::encode(mb_substr($model->request_title, 0, 30, 'UTF-8')) . (mb_strlen($model->request_title, 'UTF-8') > 30 ? '...' : '') ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Request By') ?></b> : <?= $model->created_by ? $model->createdBy->thai_name : ''; ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Department') ?></b> : <?= Html::encode($model->departments->name) ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Location') ?></b> : <?= Html::encode($model->locations->name) ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Status') ?></b> : <span class="badge" style="color: <?= $model->jobStatus->color ?>; font-size: 16px;"><?= Html::encode($model->jobStatus->name) ?></span></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Approve By') ?></b> : <?= $model->approver ? $model->approveBy->thai_name : ''; ?></p>
                                <p class="card-text"><b><?= Yii::t('app', 'Approve Date') ?></b> : <?= $model->approve_date ? Yii::$app->formatter->asDate($model->approve_date, 'dd MMMM YYYY') : ''; ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <?= $model->generateActionButtons() ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-12">
                <?php
                echo LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'maxButtonCount' => 5,
                    'firstPageLabel' => Yii::t('app', 'First'),
                    'lastPageLabel' => Yii::t('app', 'Last'),
                    'options' => ['class' => 'pagination justify-content-center'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ]);
                ?>

            </div>
        </div>
    </div>
</div>