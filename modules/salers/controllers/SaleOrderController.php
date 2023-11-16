<?php

namespace app\modules\salers\controllers;

// use app\modules\salers\models\Model;
use app\modules\salers\models\SaleItem;
use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\SaleOrderSearch;
use app\modules\sauce\models\Model;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SaleOrderController implements the CRUD actions for SaleOrder model.
 */
class SaleOrderController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SaleOrder models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SaleOrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCard()
    {
        $searchModel = new SaleOrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('card', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport()
    {
        $searchModel = new SaleOrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SaleOrder model.
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



    public function actionCreate()
    {
        $model = new SaleOrder();

        $model->status = 1;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->grand_total = $model->total + ($model->total * (intval($model->percent_vat) / 100)) - intval($model->discount); // vat temp
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SaleOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->grand_total = $model->total + ($model->total * (intval($model->percent_vat) / 100)) - intval($model->discount); // vat temp
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SaleOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);

            // Delete related Saleitem records
            SaleItem::deleteAll(['product_id' => $model->id]);

            // Delete the Order record
            $model->delete();

            $transaction->commit();

            return $this->redirect(['index']);
        } catch (Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    /**
     * Finds the SaleOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SaleOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaleOrder::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionItem($id)
    {
        $model = $this->findModel($id);

        $modelsItem = $model->saleItems; // ดูที่ hasmany

        Yii::debug($model->attributes);
        Yii::debug(count($modelsItem));
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsItem, 'id', 'id');
            $modelsItem = Model::createMultiple(SaleItem::class, $modelsItem);
            Model::loadMultiple($modelsItem, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsItem, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsItem) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            SaleItem::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsItem as $modelItem) {
                            $modelItem->order_id = $model->id;
                            if (!($flag = $modelItem->save(false))) {
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
            return $this->render('item', [
                'model' => $model,
                'modelsItem' => (empty($modelsItem)) ? [new SaleItem] : $modelsItem
            ]);
        }
    }
}
