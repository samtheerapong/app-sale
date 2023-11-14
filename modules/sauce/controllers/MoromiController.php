<?php

namespace app\modules\sauce\controllers;

use app\modules\sauce\models\Model;
use app\modules\sauce\models\Moromi;
use app\modules\sauce\models\MoromiList;
use app\modules\sauce\models\MoromiSearch;
use Exception;
use mdm\autonumber\AutoNumber;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MoromiController implements the CRUD actions for Moromi model.
 */
class MoromiController extends Controller
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
        $searchModel = new MoromiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCard()
    {
        $searchModel = new MoromiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('card', [
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
        $model = new Moromi();
        $modelsItem = [new MoromiList];

        $model->status_id = 1;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->code = AutoNumber::generate('MRM-' . (date('y') + 43) . date('m') . '-????'); // Auto Number

                $modelsItem = Model::createMultiple(MoromiList::class);
                Model::loadMultiple($modelsItem, Yii::$app->request->post());
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsItem) && $valid;

                $model->save();
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsItem as $modelitem) {
                                $modelitem->moromi_id = $model->id;
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
            'modelsItem' => (empty($modelsItem)) ? [new MoromiList] : $modelsItem
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionItem($id)
    {
        $model = $this->findModel($id);
        $modelsItem = $model->moromiLists;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsItem, 'id', 'id');
            $modelsItem = Model::createMultiple(MoromiList::class, $modelsItem);
            Model::loadMultiple($modelsItem, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsItem, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsItem) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            MoromiList::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsItem as $modelPoItem) {
                            $modelPoItem->moromi_id = $model->id;
                            if (!($flag = $modelPoItem->save(false))) {
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
                'modelsItem' => (empty($modelsItem)) ? [new MoromiList] : $modelsItem
            ]);
        }
    }

    /**
     * Deletes an existing Moromi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);

            // Delete related MoromiList records
            MoromiList::deleteAll(['moromi_id' => $model->id]);

            // Delete the Moromi record
            $model->delete();

            $transaction->commit();

            return $this->redirect(['index']);
        } catch (Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    /**
     * Finds the Moromi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Moromi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Moromi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
