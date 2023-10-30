<?php
namespace app\modules\sauce\controllers;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class ReportController extends Controller{
    public function actionReport1(){
        // $connection = Yii::$app->db;
        // $data = $connection->createCommand('
        //     SELECT year(t.DATETIME_DISCH) as yy,
        //     month(t.DATETIME_DISCH) as mm,
        //     COUNT(t.AN) as cnt
        //     FROM admission t
        //     GROUP BY yy,mm
        //     ORDER BY yy,mm
        //     ')->queryAll();
        // //เตรียมข้อมูลส่งให้กราฟ
        // foreach($data as $d){
        //     $yy[] = $d['yy'];
        //     $mm[] = $['yy'].'-'.$d['mm'];
        //     $cnt[] = $d['cnt']*1;//นำไปคูณ 1 ป้องกันเป็น string
        // }
        
        // $dataProvider = new ArrayDataProvider([
        //     'allModels'=>$data,
        //     'sort'=>[
        //         'attributes'=>['yy','mm','cnt']
        //     ],
        // ]);
        return $this->render('report1',[
            // 'dataProvider'=>$dataProvider,
            // 'yy'=>$yy,'mm'=>$mm,'cnt'=>$cnt,
        ]);
    }
}