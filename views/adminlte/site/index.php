<?php

use yii\helpers\Url;

$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

 

    <div class="row mt-2">

        <div class="col-md-3 col-sm-6">
            <div class="card mb-2">
                <img class="card-img-top" src="images/koji.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="<?= Url::toRoute(['/sauce/koji/tank/index']); ?>">
                    <h5 class="card-title mb-2"><i class="fa-solid fa-road-barrier"></i> <b>โคจิ <br>(FM-QC-38)</b></h5>
                        
                    </a>
                    <!-- <p class="card-text text-center">วัตถุดิบอันได้แก่ ถั่วเหลืองนึ่งสุก ข้าวสาลีหรือข้าวสารคั่วบดและหัวเชื้อรา (Aspergillus oryzae) จะถูกผสมและส่งเข้าไปเพาะเลี้ยงเชื้อราในห้องทีมีการควบคุมอุณหภูมิ และ ความชื้นที่เหมาะสมเป็นเวลา 2 วัน เชื้อราจะผลิตเส้นใยห่อหุ้มวัตถุดิบซึ่งเรียกว่าโคจิ</p> -->
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card mb-2">
                <img class="card-img-top" src="images/moromi.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="<?= Url::toRoute('/sauce/moromi/index'); ?>">
                        <h5 class="card-title mb-2"><i class="fa-solid fa-database"></i> <b>โมโรมิ <br>(FM-QC-18)</b></h5>
                    </a>
                    <!-- <p class="card-text text-center">โคจิจะถูกนำมาผสมกับน้ำเกลือเข้มข้น 22-25% และถูกส่งเข้าไปหมักในถังทรงสูง หลังจากนั้นก็มีการเติมเชื้อแลคติคและหัวเชื้อยีสต์เพื่อทำการหมักต่อไป ส่วนผสมนี้เรียกว่า โมโรมิ ในขั้นตอนการหมักจะมีการควบคุมอุณหภูมิให้เหมาสมและมีการเติมอากาศเป็นครั้งคราว</p> -->
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card mb-2">
                <img class="card-img-top" src="images/pasteurization.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="<?= Url::toRoute('/sauce/raw-sauce/index2'); ?>">
                        <h5 class="card-title mb-2"><i class="fa-solid fa-bore-hole"></i> <b>ซีอิ๊วดิบ <br>(FM-QC-19)</b></h5>
                    </a>
                    <!-- <p class="card-text text-center">โมโรมิจะถูกนำมาคั้นแยกน้ำซีอิ๊วดิบออกจากส่วนผสม น้ำซีอิ๊วดิบจะถูกนำมาแยกไขมัน กรอง และ ปรับคุณภาพตามข้อกำหนด ซีอิ๊วดิบที่ปรับคุณภาพแล้วจะถูกนำมาให้ความร้อนที่ 90-95 องศาเซลเซียส เพื่อทำการฆ่าเชื้อและพัฒนากลิ่นสีของผลิตภัณท์</p> -->
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card mb-2">
                <img class="card-img-top" src="images/bottling.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="<?= Url::toRoute(['/sauce/bottling/index']); ?>">
                        <h5 class="card-title mb-2"><i class="fa-solid fa-cube"></i> <b>การบรรจุขวด <br>(FM-QC-XX)</b></h5>
                    </a>
                    <!-- <p class="card-text text-center">หลังจากตกตะกอนแล้ว น้ำซีอิ๊วจะถูกนามาฆ่าเชื้อซ้ำอีกครั้งหนึ่งก่อนที่จะทำการบรรจุลงภาชนะ</p> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/nfc-process.png" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>