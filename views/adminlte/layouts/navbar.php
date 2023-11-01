<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=\yii\helpers\Url::home()?>" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= Yii::t('app', 'Record Sauce') ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= Url::toRoute('/sauce/raw-sauce/index'); ?>" class="dropdown-item"><?= Yii::t('app', 'Raw Soy Sauce Record') ?></a></li>
                <li><a href="<?= Url::toRoute('/sauce/raw-sauce/create'); ?>" class="dropdown-item"><?= Yii::t('app', 'Create New') ?></a></li>
                <li><a href="<?= Url::toRoute('/sauce/raw-sauce/report1'); ?>" class="dropdown-item"><?= Yii::t('app', 'Report') ?></a></li>
               
                <li class="dropdown-divider"></li>

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'Configuration') ?></a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= Url::toRoute(['/sauce/tank/index']);?>" class="dropdown-item"><?= Yii::t('app', 'Tank') ?></a></li>
                        <li><a href="<?= Url::toRoute(['/sauce/type/index']);?>" class="dropdown-item"><?= Yii::t('app', 'Type') ?></a></li>
                    </ul>
                </li>
                <!-- End Level two -->
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
</nav>