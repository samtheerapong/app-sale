<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace dektrium\rbac\widgets;

use Yii;
use yii\bootstrap4\Nav;

/**
 * Menu widget.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Menu extends Nav
{
    /**
     * @inheritdoc
     */
    public $options = [
        'class' => 'nav-tabs'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $userModuleClass       = 'dektrium\user\Module';
        $isUserModuleInstalled = \Yii::$app->getModule('user') instanceof $userModuleClass;

        $this->items = [
            [
                'label' => Yii::t('user', 'Users'),
                'url' => ['/user/admin/index'],
            ],
            [
                'label' => Yii::t('user', 'New user'),
                'url' => ['/user/admin/create'],
            ],
            // [
            //     'label' => Yii::t('user', 'Roles'),
            //     'url' => ['/rbac/role/index'],
            //     'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            // ],
            // [
            //     'label' => Yii::t('user', 'Permissions'),
            //     'url' => ['/rbac/permission/index'],
            //     'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            // ],
            // [
            //     'label' => \Yii::t('user', 'Rules'),
            //     'url'   => ['/rbac/rule/index'],
            //     'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            // ],

            // [
            //     'label' => Yii::t('user', 'Create'),
            //     'items' => [

            //         [
            //             'label' => Yii::t('user', 'New role'),
            //             'url' => ['/rbac/role/create'],
            //             'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            //         ],
            //         [
            //             'label' => Yii::t('user', 'New permission'),
            //             'url' => ['/rbac/permission/create'],
            //             'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            //         ],
            //         [
            //             'label' => \Yii::t('user', 'New rule'),
            //             'url'   => ['/rbac/rule/create'],
            //             'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
            //         ]
            //     ],
            // ],
            //Admin
            [
                'label' => Yii::t('user', 'Admins'),
                'url' => ['/admin/user'],
            ],

        ];
    }
}
