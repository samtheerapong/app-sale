<?php

namespace app\modules\dos\controllers;

use app\modules\dos\models\ProductSpec;
use app\modules\dos\models\ProductSpecSearch;
use app\components\Rule;
use app\models\User;
use Exception;
use mdm\autonumber\AutoNumber;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProductSpecController implements the CRUD actions for ProductSpec model.
 */
class ProductSpecController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'ruleConfig' => [
                    'class' => Rule::class,
                ],
                'only' => ['index', 'view', 'create', 'update', 'delete', 'download'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'download'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,

                        ],
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all ProductSpec models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSpecSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductSpec model.
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
     * Creates a new ProductSpec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductSpec();
        $model->revision = 1;

        if ($model->load(Yii::$app->request->post())) {

            $model->product_number = AutoNumber::generate('P' . date('Ym') . '-???');

            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
            $this->CreateDir($model->ref);
            $model->spec = $this->uploadMultipleFile($model);

            // $model->process = $model->uploadFilesProcess();
            // $model->spec = $model->uploadFilesSpec();
            // $model->fda = $model->uploadFilesFda();
            // $model->nutrition = $model->uploadFilesNutrition();

            $model->save();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Created Successfully'));

            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductSpec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->isoToArray();
        $tempspec     = $model->spec;

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            $model->spec = $this->uploadMultipleFile($model, $tempspec);

            // $model->process = $model->uploadFilesProcess();
            // $model->spec = $model->uploadFilesSpec();
            // $model->fda = $model->uploadFilesFda();
            // $model->nutrition = $model->uploadFilesNutrition();
            $model->save();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Updated Successfully'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductSpec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        ProductSpec::deleteAll(['ref' => $model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductSpec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProductSpec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductSpec::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }



    /***************** Deletefile ******************/
    public function actionDeletefile($id, $field, $fileName)
    {
        $status = ['success' => false];
        if (in_array($field, ['spec'])) {
            $model = $this->findModel($id);
            $files =  Json::decode($model->{$field});
            if (array_key_exists($fileName, $files)) {
                if ($this->deleteFile('file', $model->ref, $fileName)) {
                    $status = ['success' => true];
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
                }
            }
        }
        echo json_encode($status);
    }

    private function deleteFile($type = 'file', $ref, $fileName)
    {
        if (in_array($type, ['file', 'thumbnail'])) {
            if ($type === 'file') {
                $filePath = ProductSpec::getUploadPath() . $ref . '/' . $fileName;
            } else {
                $filePath = ProductSpec::getUploadPath() . $ref . '/thumbnail/' . $fileName;
            }
            @unlink($filePath);
            return true;
        } else {
            return false;
        }
    }



    /***************** Download ******************/
    public function actionDownload($id, $file, $fullname)
    {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->covenant)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $fullname);
        } else {
            $this->redirect(['/product/product-spec/view', 'id' => $id]);
        }
    }




    /***************** upload MultipleFile ******************/
    private function uploadMultipleFile($model, $tempFile = null)
    {
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model, 'spec');
        if ($UploadedFiles !== null) {
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $file->saveAs(ProductSpec::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                    $files[$newFileName] = $oldFileName;
                } catch (Exception $e) {
                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile, $files));
        } else {
            $json = $tempFile;
        }
        return $json;
    }


    /***************** Create Dir ******************/
    private function CreateDir($folderName)
    {
        if ($folderName != NULL) {
            $basePath = ProductSpec::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }


     /***************** Remove Upload Dir ******************/
     private function removeUploadDir($dir)
     {
         BaseFileHelper::removeDirectory(ProductSpec::getUploadPath() . $dir);
     }
}
