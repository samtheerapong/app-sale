<?php

namespace app\modules\sauce\controllers;

use app\modules\sauce\models\RawSauce;
use app\modules\sauce\models\RawSauceSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RawSauceController implements the CRUD actions for RawSauce model.
 */
class RawSauceController extends Controller
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
     * Lists all RawSauce models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RawSauceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $dataProvider->pagination = [
            'pageSize' => 20, // Number of items per page
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RawSauce model.
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
     * Creates a new RawSauce model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RawSauce();


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->calculateNaclAverages();
                $model->calculateTnAverages();

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
     * Updates an existing RawSauce model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->calculateNaclAverages();
            $model->calculateTnAverages();

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RawSauce model.
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
     * Finds the RawSauce model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RawSauce the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RawSauce::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionReport1()
    {
        $connection = Yii::$app->db;
        $data = $connection->createCommand('
        SELECT year(t.reccord_date) as yy,
        month(t.reccord_date) as mm,
        COUNT(t.AN) as cnt
        FROM raw_sauce t
        GROUP BY yy, mm
        ORDER BY yy, mm
    ')->queryAll();

        // Prepare data for the chart
        $yy = [];
        $mm = [];
        $cnt = [];

        foreach ($data as $d) {
            $yy[] = $d['yy'];
            $mm[] = $d['yy'] . '-' . $d['mm'];
            $cnt[] = $d['cnt'] * 1; // Convert to integer
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['yy', 'mm', 'cnt'],
            ],
        ]);

        return $this->render('report1', [
            'dataProvider' => $dataProvider,
            'yy' => $yy,
            'mm' => $mm,
            'cnt' => $cnt,
        ]);
    }
}
