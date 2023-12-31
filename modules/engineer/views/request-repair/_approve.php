<?php


use kartik\widgets\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\engineer\models\RequestRepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-form">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">

            <?= Html::a('<i class="fa-solid fa-eye"></i> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-info',  'aria-label' => Yii::t('app', 'View')]) ?>
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

    <div class="row">
        <div class="col-md-6">
            <div class="card border-secondary">
                <div class="card-header" style="background-color: <?= $model->jobStatus->color ?>; color: #fff;">
                    <?php echo Yii::t('app', 'Request') ?>
                </div>
                <div class="card-body">
                    <?php echo DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id',
                            // 'repair_code',
                            [
                                'attribute' => 'job_status_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return
                                        '<h5><span class="badge" style="background-color:' . $model->jobStatus->color . '; color: #FFFFFF;">' . $model->jobStatus->name . '</span></h5>';
                                },
                            ],

                            [
                                'attribute' => 'repair_code',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->repair_code;
                                },
                            ],
                            [
                                'attribute' => 'priority',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return
                                        '<h5><span class="badge" style="background-color:' . $model->priority0->color . '; color: #FFFFFF;">' . $model->priority0->name . '</span></h5>';
                                },
                            ],
                            [
                                'attribute' => 'urgency',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return
                                        '<h5><span class="badge" style="background-color:' . $model->urgency0->color . '; color: #FFFFFF;">' . $model->urgency0->name . '</span></h5>';
                                },
                            ],
                            'request_title',
                            'request_detail:ntext',
                            [
                                'attribute' => 'created_by',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->created_by ? $model->createdBy->thai_name : '';
                                },
                            ],
                            [
                                'attribute' => 'request_department',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return
                                        '<h5><span class="badge" style="background-color:#232D3F; color: #FFFFFF;">' . $model->departments->name . '</span></h5>';
                                },
                            ],

                            [
                                'attribute' => 'created_date',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->created_date ? Yii::$app->formatter->asDate($model->created_date, 'php:d M Y') : '';
                                },
                            ],



                            [
                                'attribute' => 'broken_date',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->broken_date ? Yii::$app->formatter->asDate($model->broken_date, 'php:d M Y') : '';
                                },
                            ],

                            [
                                'attribute' => 'locations_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->locations->name;
                                },
                            ],
                            'remask:ntext',
                            // 'docs:ntext',
                            // 'ref',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <div class="card border-success">
                <div class="card-header" style="background-color: <?= $model->jobStatus->color ?>; color: #fff;">
                    <?php echo Yii::t('app', 'Approval') ?>
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12">
                            <?= $form->field($model, 'approve_date')->widget(
                                DatePicker::class,
                                [
                                    'language' => 'th',
                                    'options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true,
                                        'autoclose' => true,
                                    ],
                                ]
                            ); ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $form->field($model, 'approve_comment')->textarea(['rows' => 2]) ?>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Html::submitButton('<i class="fa-solid fa-thumbs-up"></i> ' . Yii::t('app', 'Approve'), [
                                    'class' => 'btn btn-success',
                                    'onclick' => 'return confirm("' . Yii::t('app', 'Are you sure you want to approve this request?') . '");',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>