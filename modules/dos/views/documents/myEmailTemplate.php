<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\dos\models\Documents */ // Adjust the model class based on your needs

// $documentLink = Yii::$app->urlManager->createAbsoluteUrl(['documents/view', 'id' => $model->id]);

?>

<div class="email-template">
    <p>
    <h3>Hello, NFC Team</h3>
    </p>
    <p>This is a notification regarding a document:</p>

    <p style="color: Blue;"> รายละเอียด : </p>
    <ul>
        <b>
            <li><?= Yii::t('app', 'DocumentID') ?> : <?= Html::encode($data['model']->numbers) ?></li>
            <li><?= Yii::t('app', 'Title') ?> : <?= Html::encode($data['model']->title) ?></li>
            <li><?= Yii::t('app', 'Description') ?> : <?= Html::encode($data['model']->description) ?></li>
            <li><?= Yii::t('app', 'Categories') ?> : <?= Html::encode($data['model']->categories->name) ?></li>
            <li><?= Yii::t('app', 'Supplier Name') ?> : <?= Html::encode($data['model']->supplier_name) ?></li>
            <li><?= Yii::t('app', 'Occupier') ?> : <?= Html::encode($data['model']->occupier->name) ?></li>
            <li><?= Yii::t('app', 'Raw Material') ?> : <?= Html::encode($data['model']->rawMaterial->name) ?></li>
            <li><?= Yii::t('app', 'Types') ?> : <?= Html::encode($data['model']->types->name) ?></li>
            <li><?= Yii::t('app', 'Expiration Date') ?> : <?= Html::encode($data['model']->expiration_date) ?></li>
            <li><?= Yii::t('app', 'Expiration') ?> : <?= Html::encode($data['model']->getDaysToExpiration()) ?></li>
            <li><?= Yii::t('app', 'Status') ?> : <?= Html::encode($data['model']->status->name) ?></li>
            <li><?= Yii::t('app', 'Status Details') ?> : <?= Html::encode($data['model']->status_details) ?></li>
            <li><?= Yii::t('app', 'Created At') ?> : <?= Html::encode($data['model']->created_at) ?></li>
            <li><?= Yii::t('app', 'Updated At') ?> : <?= Html::encode($data['model']->updated_at) ?></li>
            <li><?= Yii::t('app', 'Url Link') ?> : <?= Html::encode($data['url']) ?></li>
        </b>
    </ul>

    <?php if (!empty($data['model']->docs)) : ?>
    <p style="color: Blue;"> Documents Files : </p>
    <ul>
        <?php
        $docs = json_decode($data['model']->docs, true);
        if (!empty($docs) && is_array($docs)) {
            foreach ($docs as $key => $value) {
                $fileUrl = Yii::$app->urlManager->createAbsoluteUrl(['documents/download', 'id' => $data['model']->id, 'file' => $key, 'fullname' => $value]);
                $downloadLink = Html::a($value, $fileUrl, ['target' => '_blank']);
        ?>
                <li>
                    <?= $downloadLink ?>
                </li>
        <?php
            }
        }
        ?>
    </ul>
<?php endif; ?>

    <p>
    <h3>โดย ระบบเอกสารกลาง บริษัท นอร์ธเทอร์น ฟู้ด คอมเพล็กซ์ จำกัด</h3>
    </p>

</div>