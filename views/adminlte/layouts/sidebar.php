<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://www.northernfoodcomplex.com/wp-content/uploads/2018/10/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: 0.8; width: 50px;">

        <span class="brand-text font-weight-light"><?php echo Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">DEMO</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    // [
                    //     'label' => 'Starter Pages',
                    //     'icon' => 'tachometer-alt',
                    //     'badge' => '<span class="right badge badge-info">2</span>',
                    //     'items' => [
                    //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //     ]
                    // ],
                    // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    // ['label' => 'Record', 'header' => true],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => Yii::t('app', 'Record Sauce'), 'header' => true],
                    ['label' => Yii::t('app', 'Raw Soy Sauce Record'), 'url' => ['/sauce/raw-sauce/index'], 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    ['label' => Yii::t('app', 'Create New'), 'url' => ['/sauce/raw-sauce/create'], 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    ['label' => Yii::t('app', 'Report'), 'url' => ['/sauce/raw-sauce/report1'], 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    [
                        'label' => Yii::t('app', 'Configuration'),
                        'items' => [
                            ['label' => Yii::t('app', 'Tank'), 'url' => ['/sauce/tank/index'], 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                            ['label' => Yii::t('app', 'Type'), 'url' => ['/sauce/type/index'], 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                        ]
                    ],
                    // ['label' => 'LABELS', 'header' => true],
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>