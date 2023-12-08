<?php

namespace app\modules\dos\controllers;

use app\modules\dos\models\Products;
use app\modules\dos\models\ProductsSearch;
use app\components\Rule;
use app\models\User;
use kartik\mpdf\Pdf;

use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

use Exception;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;

use mdm\autonumber\AutoNumber;
use yii\filters\AccessControl;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
                'only' => ['index', 'view', 'create', 'update', 'delete', 'download', 'configs'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_USER,
                            User::ROLE_QA,
                            User::ROLE_SALE,
                        ],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_QA,
                            User::ROLE_SALE,
                        ],
                    ],
                    [
                        'actions' => ['update', 'create'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_QA
                        ],
                    ],
                    [
                        'actions' => ['delete', 'configs'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_QA
                        ],
                    ],
                    [
                        'actions' => ['download'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                            User::ROLE_QA,
                            User::ROLE_SALE,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Products();
        $ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        $model->revision = 1;

        if ($model->load(Yii::$app->request->post())) {
            $this->convertProductIso($model); // Call the conversion function
            $AutoNumber = AutoNumber::generate('PS' . date('ym') . '-???');
            $model->numbers = $AutoNumber;
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model);

            if (empty($model->expiration_date)) {
                $model->expiration_date = date('Y-m-d', strtotime('+3652 days'));
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->ref =  $ref;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->productIsoToArray();
        $tempDocs = $model->docs;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $this->convertProductIso($model); // Call the conversion function
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model, $tempDocs);

            if (empty($model->expiration_date)) {
                $model->expiration_date = date('Y-m-d', strtotime('+3652 days'));
            }

            $model->save();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Updated Successfully'));
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->removeUploadDir($model->ref);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionConfigs()
    {
        return $this->render('configs');
    }



    /***************** action Deletefile ******************/
    public function actionDeletefile($id, $field, $fileName)
    {
        $status = ['success' => false];
        if (in_array($field, ['docs'])) {
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

    /***************** deleteFile ******************/
    private function deleteFile($type = 'file', $ref, $fileName)
    {
        if (in_array($type, ['file', 'thumbnail'])) {
            if ($type === 'file') {
                $filePath = Products::getUploadPath() . $ref . '/' . $fileName;
            } else {
                $filePath = Products::getUploadPath() . $ref . '/thumbnail/' . $fileName;
            }
            @unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

    /***************** upload MultipleFile ******************/
    private function uploadMultipleFile($model, $tempFile = null)
    {
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model, 'docs');
        if ($UploadedFiles !== null) {
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $file->saveAs(Products::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
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
            $basePath = Products::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    /***************** Remove Upload Dir ******************/
    private function removeUploadDir($dir)
    {
        BaseFileHelper::removeDirectory(Products::getUploadPath() . $dir);
    }


    /***************** Download ******************/
    public function actionDownload($id, $file, $fullname)
    {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->docs)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $fullname);
        } else {
            $this->redirect(['/qc/products/view', 'id' => $id]);
        }
    }


    /*******************convert ProductIso************ */
    private function convertProductIso($model)
    {
        if (is_array($model->product_iso)) {
            $model->product_iso = implode(',', $model->product_iso); // Convert array to comma-separated string
        } else {
            $model->product_iso = ''; // Set to empty string or handle as needed
        }
    }



    /***************** View PDF ******************/
    public function actionViewPdf($id)
    {
        $model = $this->findModel($id);

        $content = $this->renderPartial('pdfTemplate', ['model' => $model]); // Create a view file 'pdfTemplate.php'
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssInline' => 'body{font-family:chakrapetch;font-size:14px;}',
            'methods' => [],
            'methods' => [
                'SetHeader' => ['Export : ' . date('d-m-Y')],
                'SetFooter' => ['{PAGENO}']
            ],
            'options' => [],

        ]);

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $pdf->options['fontDir'] = array_merge($fontDirs, [
            Yii::getAlias('@webroot') . '/fonts'
        ]);

        $pdf->options['fontdata'] = $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew-Italic.ttf',
                'B' => 'THSarabunNew-Bold.ttf',
                'BI' => 'THSarabunNew-BoldItalic.ttf',
            ],
        ];

        $pdf->options['fontdata'] = $fontData + [
            'chakrapetch' => [
                'R' => 'ChakraPetch-Regular.ttf',
                'I' => 'ChakraPetch-Italic.ttf',
                'B' => 'ChakraPetch-Bold.ttf',
                'BI' => 'ChakraPetch-BoldItalic.ttf',
            ],
            'default_font' => 'chakrapetch',
        ];

        return $pdf->render();
    }
}
