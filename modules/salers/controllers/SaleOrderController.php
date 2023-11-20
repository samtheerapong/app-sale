<?php

namespace app\modules\salers\controllers;

use app\models\Model;
use app\modules\salers\models\Saleorder;
use app\modules\salers\models\SaleorderItem;
use app\modules\salers\models\SaleorderSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SaleorderController implements the CRUD actions for Saleorder model.
 */
class SaleorderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Saleorder models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SaleorderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Saleorder model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Saleorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Saleorder();
        $modelItems = [new SaleorderItem];
        $model->percent_vat = 0;
        $model->discount = 0;

        // $model->total = $model->calculateTotal();

        if ($model->load(Yii::$app->request->post())) {
            $modelItems = Model::createMultiple(SaleorderItem::class);
            Model::loadMultiple($modelItems, Yii::$app->request->post());
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelItems) && $valid;

            $model->grand_total = $model->calculateGrandTotal();

            $model->save();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelItems as $item) {
                            $item->saleorder_id = $model->id;
                            $item->unit_id =  $item->saleProduct0->units->id;
                            $item->total_price = $item->price * $item->quantity;
                            if (!($flag = $item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelItems' => (empty($modelItems)) ? [new SaleorderItem] : $modelItems
            ]);
        }
    }

    /**
     * Updates an existing Saleorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelItems = $model->saleorderItems;

        if ($model->load(Yii::$app->request->post())) {

            $model->grand_total = $model->calculateGrandTotal();

            $model->save();
            $oldIDs = ArrayHelper::map($modelItems, 'id', 'id');
            $modelItems = Model::createMultiple(SaleorderItem::class, $modelItems);
            Model::loadMultiple($modelItems, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelItems, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelItems) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            SaleorderItem::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelItems as $item) {
                            $item->saleorder_id = $model->id;
                            $item->unit_id =  $item->saleProduct0->units->id;
                            $item->total_price = $item->price * $item->quantity;

                            if (!($flag = $item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelItems' => (empty($modelItems)) ? [new SaleorderItem] : $modelItems
            ]);
        }
    }

    /**
     * Deletes an existing Saleorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Saleorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Saleorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saleorder::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
