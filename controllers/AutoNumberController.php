<?php

namespace app\controllers;

use app\models\AutoNumber;
use app\models\AutoNumberSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AutoNumberController implements the CRUD actions for AutoNumber model.
 */
class AutoNumberController extends Controller
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
            ],
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                return in_array(Yii::$app->user->identity->role_id, [2]); // Admin
                            },
                        ],
                        // [
                        //     'actions' => ['index', 'view'],
                        //     'allow' => true,
                        //     'roles' => ['@'], // Require authenticated users
                        // ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AutoNumber models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AutoNumberSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AutoNumber model.
     * @param string $group Group
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($group)
    {
        return $this->render('view', [
            'model' => $this->findModel($group),
        ]);
    }

    /**
     * Creates a new AutoNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AutoNumber();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'group' => $model->group]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AutoNumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $group Group
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($group)
    {
        $model = $this->findModel($group);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group' => $model->group]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AutoNumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $group Group
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($group)
    {
        $this->findModel($group)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AutoNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $group Group
     * @return AutoNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group)
    {
        if (($model = AutoNumber::findOne(['group' => $group])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
