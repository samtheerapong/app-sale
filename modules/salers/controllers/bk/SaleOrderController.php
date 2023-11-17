<?php

namespace app\modules\salers\controllers;

use app\modules\salers\models\SaleItem;
use app\modules\salers\models\SaleOrder;
use app\modules\salers\models\SaleOrderSearch;
use app\modules\salers\models\Model;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new SaleOrder();
        $modelsItem = [new SaleItem];

        $model->status = 1;
        
        $model->total = $this->getSaleorderItems()->sum('total_price');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->grand_total = $model->total + ($model->total * (intval($model->percent_vat) / 100)) - intval($model->discount); // vat temp

                $modelsItem = Model::createMultiple(SaleItem::class);
                Model::loadMultiple($modelsItem, Yii::$app->request->post());
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsItem) && $valid;

                $model->save();
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsItem as $modelitem) {
                                $modelitem->order_id = $model->id;
                                if (!($flag = $modelitem->save(false))) {
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
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelsItem' => (empty($modelsItem)) ? [new SaleItem] : $modelsItem
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $totalPriceSum = $this->getSaleorderItems()->sum('total_price');

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->total = $totalPriceSum;
            $model->grand_total = $totalPriceSum + ($model->total * (intval($model->percent_vat) / 100)) - intval($model->discount); // vat temp
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionItem($id)
    {
        $model = $this->findModel($id);
        $modelsItem = $model->oders0; //hasmany


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
                            CalItem::deleteAll(['id' => $deletedIDs]);
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

    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);

            // Delete related Saleitem records
            SaleItem::deleteAll(['order_id' => $model->id]);

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
}
