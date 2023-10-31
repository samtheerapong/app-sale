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

    // public $selectMonth = 10;

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
        $model = new RawSauce();
        $reportData = [];
        $mm = $ph = $nacl = $tn = $col = $alc = $ppm = $brix = [];

        if ($model->load(Yii::$app->request->post()) && isset(Yii::$app->request->post('RawSauce')['selectTank']) && isset(Yii::$app->request->post('RawSauce')['selectType'])) {
            $tankId = Yii::$app->request->post('RawSauce')['selectTank'];
            $typeId = Yii::$app->request->post('RawSauce')['selectType'];
            // ตรวจสอบว่าค่าถูกส่งมาหรือไม่
            // ทำสิ่งที่คุณต้องการกับ $tankId และ $typeId ต่อที่นี่

            $reportData = $model->getReport1Data($tankId, $typeId);

            $mm = $reportData['mm'];
            $ph = $reportData['ph'];
            $nacl = $reportData['nacl'];
            $tn = $reportData['tn'];
            $col = $reportData['col'];
            $alc = $reportData['alc'];
            $ppm = $reportData['ppm'];
            $brix = $reportData['brix'];
        }


        return $this->render('report1', [
            'model' => $model,
            'reportData' => $reportData,
            'mm' => $mm,
            'ph' => $ph,
            'nacl' => $nacl,
            'tn' => $tn,
            'col' => $col,
            'alc' => $alc,
            'ppm' => $ppm,
            'brix' => $brix,
        ]);
    }
}
