<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://www.northernfoodcomplex.com/wp-content/uploads/2018/10/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: 0.8; width: 50px;">

        <span class="brand-text font-weight-light"><?php

                                                    use yii\helpers\Url;

                                                    echo Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <div class="form-inline  mt-2 pb-1 d-flex">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    // QC
                    [
                        'label' => Yii::t('app', 'Quality Control'),
                        'header' => true
                    ],
                    [
                        'label' => Yii::t('app', 'QC'),
                        'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-q text-red',
                        'items' => [
                            // [
                            //     'label' => Yii::t('app', 'Koji'),
                            //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                            //     'items' => [
                            //         ['label' => Yii::t('app', 'Create'), 'url' => ['/sauce/koji/create'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                            //         ['label' => Yii::t('app', 'koji Record'), 'url' => ['/sauce/koji/index'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-rectangle-list'],
                            //         ['label' => Yii::t('app', 'Koji Report'), 'url' => ['/sauce/koji/report'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-pie-chart'],
                            //         [
                            //             'label' => Yii::t('app', 'Configuration'),
                            //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                            //             'items' => [
                            //                 ['label' => Yii::t('app', 'Tank'), 'url' => ['/sauce/koji/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-boxes-stacked'],
                            //                 ['label' => Yii::t('app', 'Type'), 'url' => ['/sauce/koji/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-hashtag'],
                            //             ]
                            //         ],
                            //     ]
                            // ],

                            // [
                            //     'label' => Yii::t('app', 'Moromi'),
                            //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                            //     'items' => [
                            //         ['label' => Yii::t('app', 'Raw Soy Sauce Record'), 'url' => ['/sauce/Moromi/index'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-rectangle-list'],
                            //         ['label' => Yii::t('app', 'Report Select Type'), 'url' => ['/sauce/Moromi/report1'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-chart-simple'],
                            //         ['label' => Yii::t('app', 'Report Select Tank'), 'url' => ['/sauce/Moromi/report2'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-chart-simple'],
                            //         [
                            //             'label' => Yii::t('app', 'Configuration'),
                            //             'iconStyle' => 'far',
                            //             'items' => [
                            //                 ['label' => Yii::t('app', 'Tank'), 'url' => ['/sauce/Moromi/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-boxes-stacked'],
                            //                 ['label' => Yii::t('app', 'Type'), 'url' => ['/sauce/Moromi/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-hashtag'],
                            //             ]
                            //         ],
                            //     ]
                            // ],

                            [
                                'label' => Yii::t('app', 'Raw Sauce'),
                                'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                                'items' => [
                                    ['label' => Yii::t('app', 'Raw Soy Sauce Record'), 'url' => ['/sauce/raw-sauce/index2'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-table-cells-large'],
                                    ['label' => Yii::t('app', 'Raw Soy Sauce Record'), 'url' => ['/sauce/raw-sauce/index'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-list'],
                                    ['label' => Yii::t('app', 'Report Select Type'), 'url' => ['/sauce/raw-sauce/report1'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-chart-simple'],
                                    ['label' => Yii::t('app', 'Report Select Tank'), 'url' => ['/sauce/raw-sauce/report2'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-chart-simple'],
                                    [
                                        'label' => Yii::t('app', 'Configuration'),
                                        'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-gears text-green',
                                        'items' => [
                                            ['label' => Yii::t('app', 'Tank'), 'url' => ['/sauce/tank/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-boxes-stacked'],
                                            ['label' => Yii::t('app', 'Type'), 'url' => ['/sauce/type/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-hashtag'],
                                        ]
                                    ],
                                ]
                            ],
                        ]
                    ],

                    // [
                    //     'label' => 'QA',
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-a text-red',
                    //     'items' => [
                    //         [
                    //             'label' => Yii::t('app', 'DAR'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         [
                    //             'label' => Yii::t('app', 'Certificate'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         [
                    //             'label' => Yii::t('app', 'Products Spec'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         [
                    //             'label' => Yii::t('app', 'Raw Material'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         [
                    //             'label' => Yii::t('app', 'Process Flow'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         [
                    //             'label' => Yii::t('app', 'NCR'),
                    //             'iconStyle' => 'far',
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //     ]
                    // ],


                    // EN
                    [
                        'label' => Yii::t('app', 'Engineering'),
                        'header' => true
                    ],
                    [
                        'label' => Yii::t('app', 'Request Repair'),
                        'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                        'items' => [
                            ['label' => Yii::t('app', 'Request Repair'), 'url' => ['/engineer/request-repair/index'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                            [
                                'label' => Yii::t('app', 'Configuration'),
                                'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                                'items' => [
                                    ['label' => Yii::t('app', 'Job Status'), 'url' => ['/engineer/job-status/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                                    ['label' => Yii::t('app', 'Urgency'), 'url' => ['/general/urgency/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                                    ['label' => Yii::t('app', 'Priority'), 'url' => ['/general/priority/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                                ]
                            ],
                        ]
                    ],
                    // [
                    //     'label' => Yii::t('app', 'Machine history'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],

                    // AC
                    // [
                    //     'label' => Yii::t('app', 'Accounting'),
                    //     'header' => true
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'Fixed Assets'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],

                    // HR
                    // [
                    //     'label' => Yii::t('app', 'Human Resource'),
                    //     'header' => true
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'Leave Online'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],

                    // IT
                    // [
                    //     'label' => Yii::t('app', 'Information Technology'),
                    //     'header' => true
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'Job Online'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'IT Assets'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'IT Store'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],

                    // PD
                    // [
                    //     'label' => Yii::t('app', 'Production'),
                    //     'header' => true
                    // ],
                    // [
                    //     'label' => Yii::t('app', 'Check Sheet'),
                    //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-angles-right text-yellow',
                    //     'items' => [
                    //         ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-plus'],
                    //         [
                    //             'label' => Yii::t('app', 'Configuration'),
                    //             'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                    //             'items' => [
                    //                 ['label' => Yii::t('app', 'Demo'), 'url' => ['/demo'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cog'],
                    //             ]
                    //         ],
                    //     ]
                    // ],

                    // Systems
                    [
                        'label' => Yii::t('app', 'System'),
                        'header' => true
                    ],
                    [
                        'label' => Yii::t('app', 'Setings'),
                        'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs text-red',
                        'items' => [
                            ['label' => Yii::t('app', 'User'), 'url' => ['/user/index'], 'iconStyle' => 'fa', 'icon' => 'fa-regular fa-user-plus'],
                            ['label' => Yii::t('app', 'Profile'), 'url' => ['/user/profile'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-user-edit'],
                            ['label' => Yii::t('app', 'Auto Number'), 'url' => ['/auto-number/index'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-code'],
                            // [
                            //     'label' => Yii::t('app', 'Configuration'),
                            //     'iconStyle' => 'fa', 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-cogs',
                            //     'items' => [
                            //         ['label' => Yii::t('app', 'Profile'), 'url' => ['/user/profile'], 'iconStyle' => 'fa', 'icon' => 'fa-solid fa-user-edit'],
                            //     ]
                            // ],
                        ]
                    ],

                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>