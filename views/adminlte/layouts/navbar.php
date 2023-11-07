<?php

use kartik\helpers\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= \yii\helpers\Url::home() ?>" class="nav-link"><?= Yii::t('app', 'Home') ?></a>
        </li> -->
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'QC') ?></a>


            <!-- QC: Menu -->
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Koji') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= Url::toRoute('/sauce/koji/index'); ?>" class="dropdown-item"><?= Yii::t('app', 'Koji Record') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/koji/create'); ?>" class="dropdown-item"><?= Yii::t('app', 'Create New') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/koji/report1'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report Koji 1') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/koji/report2'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report Koji 2') ?></a></li>
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Configuration') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= Url::toRoute(['/sauce/koji/tank/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Tank') ?></a></li>
                                <li><a href="<?= Url::toRoute(['/sauce/koji/type/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Type') ?></a></li>

                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Moromi') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= Url::toRoute('/sauce/moromi/index'); ?>" class="dropdown-item"><?= Yii::t('app', 'Moromi Record') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/moromi/create'); ?>" class="dropdown-item"><?= Yii::t('app', 'Create New') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/moromi/report1'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report 1') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/moromi/report2'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report 2') ?></a></li>
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Configuration') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= Url::toRoute(['/sauce/moromi/tank/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Tank') ?></a></li>
                                <li><a href="<?= Url::toRoute(['/sauce/moromi/type/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Type') ?></a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Raw Soy Sauce') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= Url::toRoute('/sauce/raw-sauce/index2'); ?>" class="dropdown-item"><?= Yii::t('app', 'Record Card') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/raw-sauce/index'); ?>" class="dropdown-item"><?= Yii::t('app', 'Record Table') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/raw-sauce/report1'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report Select Type') ?></a></li>
                        <li><a href="<?= Url::toRoute('/sauce/raw-sauce/report2'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report Select Tank') ?></a></li>
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Configuration') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= Url::toRoute(['/sauce/tank/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Tank') ?></a></li>
                                <li><a href="<?= Url::toRoute(['/sauce/type/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Type') ?></a></li>
                            </ul>
                        </li>

                    </ul>
                </li>


            </ul>
        </li>


        <!-- IT: Menu -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'IT') ?></a>

            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'IT1') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        IT 1.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'IT1') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                IT 1.2

                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'IT2') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        IT 2.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'IT 2') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                IT2.2
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </li>

        <!-- AC: Menu -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'HR') ?></a>

            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC1') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        AC 1.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC1') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                AC 1.2

                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC2') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        AC 2.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC 2') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                IT2.2
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </li>



        <!-- AC: Menu -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'AC') ?></a>

            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC1') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        AC 1.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC1') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                AC 1.2

                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC2') ?></a>

                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        AC 2.1
                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'AC 2') ?></a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                IT2.2
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </li>









        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'EN') ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <!-- Koji submenu -->
                <li><a href="<?= Url::toRoute('/engineer/request-repair/index'); ?>" class="dropdown-item"><?= Yii::t('app', 'Request Repair') ?></a></li>


                <li class="dropdown-divider"></li>

                <!-- Configuration submenu -->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Configuration') ?></a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= Url::toRoute(['/sauce/koji/tank/index']); ?>" class="dropdown-item"><?= Yii::t('app', 'Tank') ?></a></li>
                    </ul>
                </li>
            </ul>
        </li>



    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?= Html::a(
                '<i class="fas fa-sign-out-alt"></i>',
                // ['/site/logout'],
                ['/user/security/logout'],
                ['data-method' => 'post', 'class' => 'nav-link']
            ) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>

    <span>
        <?= Html::a(Html::img('https://cdn.pixabay.com/photo/2013/07/12/17/58/thailand-152711_1280.png', ['width' => '20px']), Url::current(['language' => 'th-TH']), ['class' => (Yii::$app->request->cookies['language'] == 'th-TH' ? 'active' : '')]); ?>
        <?= Html::a(Html::img('https://cdn.pixabay.com/photo/2015/11/06/13/29/union-jack-1027898_1280.jpg', ['width' => '20px']), Url::current(['language' => 'en-US']), ['class' => (Yii::$app->request->cookies['language'] == 'en-US' ? 'active' : '')]); ?>

    </span>
</nav>