<?php

namespace app\controllers;

use app\models\OrderDetail;
use app\models\Orders;
use app\models\OrdersSearch;
use app\models\Product;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
     * Lists all Orders models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
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
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Orders(); //สร้างใบ Order
        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save(); //บันทึกใบ Order

                $items = Yii::$app->request->post();

                //var_dump($items['Order']['items']);

                foreach ($items['Order']['items'] as $key => $val) { //นำรายการสินค้าที่เลือกมา loop บันทึก
                    if (empty($val['id'])) {
                        $order_detail = new OrderDetail();
                    } else {
                        $order_detail = OrderDetail::findOne($val['id']);
                    }
                    $order_detail->order_id = $model->id;
                    $order_detail->amount = $val['amount'];
                    //หาราคาสินค้า
                    $product = Product::findOne($val['product_id']);

                    $order_detail->product_id = $product->id;
                    $order_detail->price = $product->price; //ราคาจากสินค้า
                    $order_detail->save();
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Orders::findOne($id); //เลือกใบ Order
        $model->items = OrderDetail::find()->where(['order_id' => $model->id])->all();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save(); //บันทึกใบ Order

                $items = Yii::$app->request->post();

                //var_dump($items['Order']['items']);

                foreach ($items['Order']['items'] as $key => $val) { //นำรายการสินค้าที่เลือกมา loop บันทึก
                    if (empty($val['id'])) {
                        $order_detail = new OrderDetail();
                    } else {
                        $order_detail = OrderDetail::findOne($val['id']);
                    }
                    $order_detail->order_id = $model->id;
                    $order_detail->amount = $val['amount'];
                    //หาราคาสินค้า
                    $product = Product::findOne($val['product_id']);

                    $order_detail->product_id = $product->id;
                    $order_detail->price = $product->price; //ราคาจากสินค้า
                    $order_detail->save();
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
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
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
