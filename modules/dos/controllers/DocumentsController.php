<?php

namespace app\modules\dos\controllers;

use Yii;
use app\modules\dos\models\Documents;
use app\modules\dos\models\DocumentsSearch;
use app\components\Rule;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mdm\autonumber\AutoNumber;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;
use Exception;
use Faker\Documentor;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\helpers\BaseFileHelper;

// use kartik\mpdf\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use yii\db\Expression;
use yii\helpers\Url;
use yii\swiftmailer\Message;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
{
    /**
     * @inheritDoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::class,
    //             'actions' => [
    //                 'delete' => ['post'],
    //             ],
    //         ],
    //         'access' => [
    //             'class' => AccessControl::class,
    //             'ruleConfig' => [
    //                 'class' => Rule::class,
    //             ],
    //             'only' => ['index', 'view', 'create', 'update', 'delete', 'download', 'configs'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['index'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         User::ROLE_ADMIN,
    //                         User::ROLE_MANAGER,
    //                         User::ROLE_USER,
    //                         User::ROLE_QA,
    //                         User::ROLE_SALE,
    //                     ],
    //                 ],
    //                 [
    //                     'actions' => ['view'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         User::ROLE_ADMIN,
    //                         User::ROLE_MANAGER,
    //                         User::ROLE_QA,
    //                         User::ROLE_SALE,
    //                     ],
    //                 ],
    //                 [
    //                     'actions' => ['update', 'create'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         User::ROLE_ADMIN,
    //                         User::ROLE_MANAGER,
    //                         User::ROLE_QA
    //                     ],
    //                 ],
    //                 [
    //                     'actions' => ['delete', 'configs'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         User::ROLE_ADMIN,
    //                         User::ROLE_QA
    //                     ],
    //                 ],
    //                 [
    //                     'actions' => ['download'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         User::ROLE_ADMIN,
    //                         User::ROLE_MANAGER,
    //                         User::ROLE_QA,
    //                         User::ROLE_SALE,
    //                     ],
    //                 ],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all Documents models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DocumentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // $dataProvider->pagination = [
        //     'pageSize' => 15, // Number of items per page
        // ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
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
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Documents();
        $model->document_date = 60;
        $ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);

        if ($model->load(Yii::$app->request->post())) {
            $AutoNumber = AutoNumber::generate(date('Ym') . '-???');
            $model->numbers = $AutoNumber;
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model);
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
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tempDocs = $model->docs;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $this->CreateDir($model->ref);
            $model->docs = $this->uploadMultipleFile($model, $tempDocs);
            $model->save();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Updated Successfully'));
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Documents model.
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
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionConfigs()
    {
        return $this->render('configs');
    }


    /**************** show-Wanning page ******************/
    public function actionShowWanning()
    {
        // Fetch documents with expiration date between 0 and 30 days from now
        $model = Documents::find()
            ->select('*')
            ->select([
                '*',
                new Expression('DATEDIFF(expiration_date, NOW()) AS daysToExpiration')
            ])
            ->where(['between', 'DATEDIFF(expiration_date, NOW())', 0, 60])
            ->all();

        // Create a data provider using the fetched model
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $model,
            'pagination' => false, // You can configure pagination here if needed
        ]);

        return $this->render('show-wanning', [
            'model' => $model, // Pass the dataProvider to the view
            'dataProvider' => $dataProvider, // Pass the dataProvider to the view
        ]);
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
                $filePath = Documents::getUploadPath() . $ref . '/' . $fileName;
            } else {
                $filePath = Documents::getUploadPath() . $ref . '/thumbnail/' . $fileName;
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
                    $file->saveAs(Documents::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
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
            $basePath = Documents::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    /***************** Remove Upload Dir ******************/
    private function removeUploadDir($dir)
    {
        BaseFileHelper::removeDirectory(Documents::getUploadPath() . $dir);
    }


    /***************** Download ******************/
    public function actionDownload($id, $file, $fullname)
    {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->docs)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $fullname);
        } else {
            $this->redirect(['/documents/view', 'id' => $id]);
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
            // 'cssInline' => 'body{font-family:sarabun;font-size:20px;}',
            // 'cssFile' => '@backend/web/css/bootstrap.css',
            'methods' => [],
            // 'marginLeft' => 10,
            // 'marginRight' => 10,
            // 'marginTop' => 10,
            // 'marginBottom' => 10,
            // 'marginFooter' => 5,
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

    //sent mail and line
    public function actionSendNotify($id)
    {
        $model = $this->findModel($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $recipients = [
            'theerapong.khan@gmail.com',
            'itnfc@northernfoodcomplex.com',
        ];
        $subject = 'Document Center Notification';
        $templateView = 'myEmailTemplate';

        $data = [
            'model' => $model,
            'url' => Url::to(['view', 'id' => $model->id], true)
        ];

        if ($this->sendMail($recipients, $subject, $templateView, $data)) {
            $model->LineNotify();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Notify message sent successfully'));
        } else {
            Yii::$app->session->setFlash('error', 'Notify message sending failed.');
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    protected function sendMail($recipient, $subject, $templateView, $data = [])
    {
        $mailer = Yii::$app->mailer;
        $message = new Message();

        $message->setTo($recipient);
        $message->setFrom(['northernfood.it@hotmail.com' => 'NFC-DocumentCenter']);
        $message->setSubject($subject);
        $message->setHtmlBody($this->renderPartial($templateView, ['data' => $data]));

        return $mailer->send($message);
    }
}
