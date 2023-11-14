<?php

use kartik\helpers\Html;
use yii\bootstrap5\Nav;
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
       


        <?php
        // ++++++++++++ QC +++++++++++++++
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                [
                    'label' => Yii::t('app', 'QC'),
                    'items' => [
                        // [
                        //     'label' => Yii::t('app', 'Koji'),
                        //     'items' => [
                        //         ['label' => Yii::t('app', 'Koji Record'), 'url' => Url::toRoute('/sauce/koji/index')],
                        //         // ['label' => Yii::t('app', 'Create New'), 'url' => Url::toRoute('/sauce/koji/create')],
                        //         ['label' => Yii::t('app', 'Report Koji 1'), 'url' => Url::toRoute('/sauce/koji/report1')],
                        //         ['label' => Yii::t('app', 'Report Koji 2'), 'url' => Url::toRoute('/sauce/koji/report2')],
                        //         '<div class="dropdown-divider"></div>',
                        //         [
                        //             'label' => Yii::t('app', 'Configuration'),
                        //             'items' => [
                        //                 ['label' => Yii::t('app', 'Tank'), 'url' => Url::toRoute(['/sauce/koji/tank/index'])],
                        //                 ['label' => Yii::t('app', 'Type'), 'url' => Url::toRoute(['/sauce/koji/type/index'])],
                        //             ],
                        //             'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                        //         ],
                        //     ],
                        //     'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                        // ],
                        [
                            'label' => Yii::t('app', 'Moromi'),
                            'items' => [
                                ['label' => Yii::t('app', 'Moromi Record'), 'url' => Url::toRoute('/sauce/moromi/index')],
                                ['label' => Yii::t('app', 'Report Moromi 1'), 'url' => Url::toRoute('/sauce/moromi/report')],
                                '<div class="dropdown-divider"></div>',
                                [
                                    'label' => Yii::t('app', 'Configuration'),
                                    'items' => [
                                        ['label' => Yii::t('app', 'Tank Source'), 'url' => Url::toRoute(['/sauce/tank-source/index'])],
                                        ['label' => Yii::t('app', 'Tank Destination'), 'url' => Url::toRoute(['/sauce/tank-destination/index'])],
                                        ['label' => Yii::t('app', 'Moromi Memo'), 'url' => Url::toRoute(['/sauce/moromi-list-memo/index'])],
                                    ],
                                    'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                                ],
                            ],
                            'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                        ],
                        [
                            'label' => Yii::t('app', 'Raw Soy Sauce'),
                            'items' => [
                                ['label' => Yii::t('app', 'Table'), 'url' => Url::toRoute('/sauce/raw-sauce/index')],
                                ['label' => Yii::t('app', 'Card'), 'url' => Url::toRoute('/sauce/raw-sauce/index2')],
                                // ['label' => Yii::t('app', 'Create New Raw Sauce'), 'url' => Url::toRoute('/sauce/raw-sauce/create')],
                                ['label' => Yii::t('app', 'Report Select Type'), 'url' => Url::toRoute('/sauce/raw-sauce/report1')],
                                ['label' => Yii::t('app', 'Report Select Tank'), 'url' => Url::toRoute('/sauce/raw-sauce/report2')],
                                '<div class="dropdown-divider"></div>',
                                [
                                    'label' => Yii::t('app', 'Configuration'),
                                    'items' => [
                                        ['label' => Yii::t('app', 'Tank'), 'url' => Url::toRoute(['/sauce/tank/index'])],
                                        ['label' => Yii::t('app', 'Type'), 'url' => Url::toRoute(['/sauce/type/index'])],
                                    ],
                                    'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                                ],
                            ],
                            'options' => ['class' => 'dropdown-submenu dropdown-hover'],
                        ],
                        // Add other menu items for Moromi and Raw Soy Sauce similarly...
                    ],
                    'options' => ['class' => 'nav-item dropdown'],
                    'linkOptions' => [
                        'id' => 'dropdownSubMenu1',
                        'class' => 'nav-link dropdown-toggle',
                        'data-toggle' => 'dropdown',
                        'aria-haspopup' => 'true',
                        'aria-expanded' => 'false',
                    ],
                ],
            ],
        ]);

        // ++++++++++++ IT +++++++++++++++
        // echo Nav::widget([
        //     'options' => ['class' => 'navbar-nav'],
        //     'items' => [
        //         [
        //             'label' => Yii::t('app', 'IT'),
        //             'items' => [
        //                 [
        //                     'label' => Yii::t('app', 'IT1'),
        //                     'items' => [
        //                         ['label' => 'IT 1.1', 'url' => '#'],
        //                         '<div class="dropdown-divider"></div>',
        //                         [
        //                             'label' => Yii::t('app', 'IT1'),
        //                             'items' => [
        //                                 ['label' => 'IT 1.2', 'url' => '#'],
        //                                 // ... add more submenu items as needed ...
        //                             ],
        //                             'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                         ],
        //                     ],
        //                     'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                 ],
        //                 [
        //                     'label' => Yii::t('app', 'IT2'),
        //                     'items' => [
        //                         ['label' => 'IT 2.1', 'url' => '#'],
        //                         '<div class="dropdown-divider"></div>',
        //                         [
        //                             'label' => Yii::t('app', 'IT 2'),
        //                             'items' => [
        //                                 ['label' => 'IT2.2', 'url' => '#'],
        //                                 // ... add more submenu items as needed ...
        //                             ],
        //                             'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                         ],
        //                     ],
        //                     'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                 ],
        //             ],
        //             'options' => ['class' => 'nav-item dropdown'],
        //             'linkOptions' => [
        //                 'id' => 'dropdownSubMenu1',
        //                 'class' => 'nav-link dropdown-toggle',
        //                 'data-toggle' => 'dropdown',
        //                 'aria-haspopup' => 'true',
        //                 'aria-expanded' => 'false',
        //             ],
        //         ],
        //     ],
        // ]);

        // ++++++++++++ AC +++++++++++++++
        // echo Nav::widget([
        //     'options' => ['class' => 'navbar-nav'],
        //     'items' => [
        //         [
        //             'label' => Yii::t('app', 'AC'),
        //             'items' => [
        //                 [
        //                     'label' => Yii::t('app', 'AC1'),
        //                     'items' => [
        //                         ['label' => 'AC 1.1', 'url' => '#'],
        //                         '<div class="dropdown-divider"></div>',
        //                         [
        //                             'label' => Yii::t('app', 'AC1'),
        //                             'items' => [
        //                                 ['label' => 'AC 1.2', 'url' => '#'],
        //                                 // ... add more submenu items as needed ...
        //                             ],
        //                             'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                         ],
        //                     ],
        //                     'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                 ],
        //                 [
        //                     'label' => Yii::t('app', 'AC2'),
        //                     'items' => [
        //                         ['label' => 'AC 2.1', 'url' => '#'],
        //                         '<div class="dropdown-divider"></div>',
        //                         [
        //                             'label' => Yii::t('app', 'AC 2'),
        //                             'items' => [
        //                                 ['label' => 'AC 2.2', 'url' => '#'],
        //                                 // ... add more submenu items as needed ...
        //                             ],
        //                             'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                         ],
        //                     ],
        //                     'options' => ['class' => 'dropdown-submenu dropdown-hover'],
        //                 ],
        //             ],
        //             'options' => ['class' => 'nav-item dropdown'],
        //             'linkOptions' => [
        //                 'id' => 'dropdownSubMenu1',
        //                 'class' => 'nav-link dropdown-toggle',
        //                 'data-toggle' => 'dropdown',
        //                 'aria-haspopup' => 'true',
        //                 'aria-expanded' => 'false',
        //             ],
        //         ],
        //     ],
        // ]);

        // ++++++++++++ EN +++++++++++++++
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                [
                    'label' => Yii::t('app', 'EN'),
                    'items' => [
                        ['label' => Yii::t('app', 'Request Repair'), 'url' => Url::toRoute('/engineer/request-repair/index')],
                        '<div class="dropdown-divider"></div>',
                        // Dropdown Header
                        [
                            'label' => Yii::t('app', 'Configuration'),
                            'options' => ['class' => 'dropdown-header', 'style' => 'text-align: left;'],
                        ],
                        ['label' => Yii::t('app', 'Job Status'), 'url' => Url::toRoute(['/engineer/job-status/index'])],
                        ['label' => Yii::t('app', 'Urgency'), 'url' => Url::toRoute(['/general/urgency/index'])],
                        ['label' => Yii::t('app', 'Priority'), 'url' => Url::toRoute(['/general/priority/index'])],
                        // ... add more items as needed ...
                    ],
                    'options' => ['class' => 'nav-item dropdown'],
                    'linkOptions' => [
                        'id' => 'dropdownSubMenu1',
                        'class' => 'nav-link dropdown-toggle',
                        'data-toggle' => 'dropdown',
                        'aria-haspopup' => 'true',
                        'aria-expanded' => 'false',
                    ],
                ],
            ],
        ]);

        ?>


    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php
        if (Yii::$app->user->isGuest) {
            // echo Html::tag('li', Html::a(Yii::t('app', 'Register'), ['/site/signup'], ['class' => 'nav-link']));
            echo Html::tag('li', Html::a(Yii::t('app', 'Login'), ['/site/login'], ['class' => 'nav-link']));
        } else {
            $nameToDisplay = Yii::$app->user->identity->thai_name ?: Yii::$app->user->identity->username;
            $menuItems = [
                [
                    'label' => Yii::t('app', 'Configuration'),
                    'visible' => in_array(Yii::$app->user->identity->username, ['admin', 'theerapong']),
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Auto Number'),
                            'visible' => in_array(Yii::$app->user->identity->username, ['admin']),
                            'url' => ['/auto-number/index'],
                        ],
                        [
                            'label' => Yii::t('app', 'Profile'),
                            'url' => ['/user/view', 'id' => Yii::$app->user->identity->id],
                        ],
                        [
                            'label' => Yii::t('app', 'Users'),
                            'url' => ['/user/index'],
                        ],
                    ],
                ],
                [
                    'label' => Yii::$app->language == 'th-TH' ? 'TH' : 'EN',
                    'url' => Url::current(['language' => Yii::$app->language == 'th-TH' ? 'en-US' : 'th-TH']),
                    'linkOptions' => ['class' => 'active'],
                ],
                [
                    'label' => "( $nameToDisplay )",
                    'items' => [
                        ['label' => Yii::t('app', 'Logout'), 'url' => ['/site/logout'], 'linkOptions' => ['class' => 'logout-link', 'data-method' => 'post']],
                    ],
                ],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav ml-auto'],
                'items' => $menuItems,
            ]);
        }
        ?>

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
</nav>