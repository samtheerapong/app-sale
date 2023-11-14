++tips # 5 ++ dyamic- form
==========

tips นี้ขอมาแบบadvanced กันนิดนึง เนื่องจากมีผู้อ่านท่านนึงinbox มาปรึกษา
การใช้งาน dynamic-form ตามvdo ของ doingiteasy เหตุเพราะเขาสอนแต่ create ไม่ได้สอนupdate ดังนั้นเราจึงนะแนะนำในส่วนนี้การ update dyamicform เริ่มจาก create นะคะ เพราะมันต้องต่อเนื่องกัน

รู้แล้วเนาะว่าเราต้องเพิ่มโมเดล Model.php เข้ามาก่อน ตามไปเอาตามลิ๊งค์นี้เลย

https://github.com/wbraganca/yii2-dynamicform
หลัการเราจะทำงานในส่วนของ controller กับ view

controller - create
======
use ตัวนี้มาด้วยนะคะ และ use โมเดล ที่จะเอามาแสดงด้วยเด้อ ยกตัวอย่างเราใช้
2โมเดล Pdata.php - Pheader.php
จะเอาgrid ของPdata มาแสดงในgrid ของ Pheader มาทำในส่วนcontroller
PheaderController ก่อนเลย
-------------------------------
use app\models\Pdata;
use app\base\Model;
use yii\helpers\ArrayHelper;

public function actionCreate()
{
$model = new Pheader();
$modelsPdata = [new Pdata];

if ($model->load(Yii::$app->request->post()) && $model->save())
{

$modelsPdata = Model::createMultiple(Pdata::classname());
Model::loadMultiple($modelsPdata, Yii::$app->request->post());

$valid = $model->validate();
$valid = Model::validateMultiple($modelsPdata) && $valid;

if ($valid) {
$transaction = \Yii::$app->db->beginTransaction();
try {
if ($flag = $model->save(false)) {
foreach ($modelsPdata as $modelPdata) {
$modelPdata->docno = $model->docno;
if (! ($flag = $modelPdata->save(false))) {
$transaction->rollBack();
break;
}
}
}
if ($flag) {
$transaction->commit();
return $this->redirect(['index']);
}
} catch (Exception $e) {
$transaction->rollBack();
}
}
}
else {
return $this->render('create', [
'model' => $model,
'modelsPdata' => (empty($modelsPdata)) ? [new CalItem] : $modelsPdata
]);
}
}

------------------------------------------------------
public function actionUpdate($id)
{
$model = $this->findModel($id);
$modelsPdata = $model->pdatas;

if ($model->load(Yii::$app->request->post()) && $model->save())
{
$oldIDs = ArrayHelper::map($modelsPdata, 'id', 'id');
$modelsPdata = Model::createMultiple(Pdata::classname(), $modelsPdata);
Model::loadMultiple($modelsPdata, Yii::$app->request->post());
$deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPdata, 'id', 'id')));

$valid = $model->validate();
$valid = Model::validateMultiple($modelsPdata) && $valid;

if ($valid) {
$transaction = \Yii::$app->db->beginTransaction();
try {
if ($flag = $model->save(false)) {
if (! empty($deletedIDs)) {
CalItem::deleteAll(['id' => $deletedIDs]);
}
foreach ($modelsPdata as $modelPdata) {
$modelPdata->docno = $model->docno;
if (! ($flag = $modelPdata->save(false))) {
$transaction->rollBack();
break;
}
}
}
if ($flag) {
$transaction->commit();
return $this->redirect(['index']);
}
} catch (Exception $e) {
$transaction->rollBack();
}
}
}
else {
return $this->render('update', [
'model' => $model,
'modelsPdata' => (empty($modelsPdata)) ? [new Pdata] : $modelsPdata
]);
}
}
--------------------------------------------------------

จากนั้น ไปที่ views/pheader- _form.php
use wbraganca\dynamicform\DynamicFormWidget; มาด้วยค่ะ ดูโค้ดเราเต็มๆเลย

<div class="pheader-form">

<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
<div class="row">

<div class="col-xs-3 col-sm-3 col-md-4">
<?=
$form->field($model, 'department_id')->widget(Select2::className(), ['data' =>
ArrayHelper::map(app\models\Departments::find()->orderBy('name')->all(), 'id', 'name'),
'options' => [
'placeholder' => '<--หน่วยงาน-->'],
'pluginOptions' => [
'allowClear' => true,],
]);
?>
</div>
<div class="col-sm-offset-2 col-sm-2">
<i class="glyphicon glyphicon-shopping-cart" style="font-size:5em;"></i>
</div>

</div>
<hr>
<!-- <div class="row">
<div class="panel panel-default">
<div class="panel-heading"><h4> ให้เลือกรายการเครื่องมือแพทย์ที่สอบเทียบในครั้งนี้</h4></div>
<div class="panel-body">-->
<?php DynamicFormWidget::begin([
'widgetContainer' => 'dynamicform_wrapper',
'widgetBody' => '.container-items',
'widgetItem' => '.item',
'limit' => 10,
'min' => 1,
'insertButton' => '.add-item',
'deleteButton' => '.remove-item',
'model' => $modelsPdata[0],
'formId' => 'dynamic-form',
'formFields' => [
'pproduct_id',
'qty',
'qtyok',
'remark',

],
]); ?>
<div class="container-items"><!-- widgetContainer -->
<?php foreach ($modelsPdata as $i => $modelPdata): ?>
<div class="item panel panel-default"><!-- widgetBody -->
<div class="panel-heading">
<h4 class="panel-title pull-left"><i class="glyphicon glyphicon-search"></i> คลิกเลือกรายการ</h4>
<div class="pull-right">
<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<?php
if (! $modelPdata->isNewRecord) {
echo Html::activeHiddenInput($modelPdata, "[{$i}]id");
}
?>
<div class="row">
<div class="col-sm-5">
<?= $form->field($modelPdata, "[{$i}]pproduct_id")->widget(Select2::className(), ['data' =>
ArrayHelper::map(Pproducts::find()->all(), 'id',
function($model, $defaultValue) {
return $model->product;
}),
'options' => [
'placeholder' => '<--รายการ-->'],
'pluginOptions' => [
'allowClear' => true,
],
]);
?>
</div>
<div class="col-sm-2">
<?= $form->field($modelPdata, "[{$i}]qty")->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-2">
<?= $form->field($modelPdata, "[{$i}]qtyok")->textInput(['readonly'=>true,'maxlength' => true]) ?>
</div>

<div class="col-sm-3">
<?= $form->field($modelPdata, "[{$i}]remark")->textInput(['maxlength' => true]) ?>
</div>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<!-- </div>-->
<?php DynamicFormWidget::end(); ?>
<!-- </div>-->
<!-- </div>
</div>-->
<div class="form-group">
<div class="col-sm-offset-2 col-sm-9">
<?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update',
['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary']) ?>
</div>
</div>
<?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

JS;
$this->registerJs($script);
?>
----------------------------------------

ใน views/pheader - create - update อย่าลืมส่งค่าไปด้วย

<?= $this->render('_form', [
'model' => $model,
'modelsPdata'=>$modelsPdata,
]) ?>
-----------------------------------------