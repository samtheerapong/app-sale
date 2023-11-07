<?php

use yii\db\Migration;

class m231107_015704_create_user_profile extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        // Create the 'user' table
        $this->createTable('{{%user}}', [
            'id'                    => $this->primaryKey(),
            'username'              => $this->string(25)->notNull(),
            'auth_key'              => $this->string(60),
            'password_hash'         => $this->string(60)->notNull(),
            'password_reset_token'  => $this->string(60),
            'email'                 => $this->string(255)->notNull(),
            'status'                => $this->smallInteger()->notNull()->defaultValue(10),
            'role'                  => $this->smallInteger()->notNull()->defaultValue(1),
            'rule'                  => $this->smallInteger()->notNull()->defaultValue(1),
            'department'            => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at'            => $this->date()->notNull(),
            'updated_at'            => $this->date()->notNull(),
        ], $tableOptions);

        $this->createIndex('user_unique_username', '{{%user}}', 'username', true);
        $this->createIndex('user_unique_email', '{{%user}}', 'email', true);

        // Create the 'profile' table
        $this->createTable('{{%profile}}', [
            'user_id'           => $this->primaryKey(),
            'name'              => $this->string(255),
            'thai_name'         => $this->string(255),
            'public_email'      => $this->string(255),
            'gravatar_email'    => $this->string(255),
            'gravatar_id'       => $this->string(32),
            'location'          => $this->string(255),
            'website'           => $this->string(255),
            'bio'               => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_user_profile', '{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        
        $security = Yii::$app->security;

        // role [
        //     10 = 'admin, 
        //     4 = 'head, 
        //     3 = 'approver, 
        //     2 = 'manager, 
        //     1 = 'user, 
        //     ]

        $this->batchInsert(
            'user',
            [
                'username',
                'auth_key',
                'password_hash',
                'email',
                'status',
                'role',
                'rule',
                'department',
                'created_at',
                'updated_at',
            ],
            [
                ['admin', $security->generateRandomString(), $security->generatePasswordHash('admin123456'), 'admin@local.com', 10, 10, 10, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
                ['manager', $security->generateRandomString(), $security->generatePasswordHash('manager123456'), 'manage@local.com', 10, 2, 2, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
                ['approver', $security->generateRandomString(), $security->generatePasswordHash('approver123456'), 'approver@local.com', 10, 3, 3, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
                ['head', $security->generateRandomString(), $security->generatePasswordHash('head123456'), 'head@local.com', 10, 4, 4, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
                ['demo', $security->generateRandomString(), $security->generatePasswordHash('demo123456'), 'demo@local.com', 10, 1, 1, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
                ['user', $security->generateRandomString(), $security->generatePasswordHash('user123456'), 'user@local.com', 10, 1, 1, 1, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
            ]
        );

        $this->batchInsert(
            'profile',
            [
                'user_id',
                'name',
                'thai_name'  
            ],
            [
                [1,'Admin','แอดมิน'],
                [2,'Manager','ผู้จัดการ'],
                [3,'Approver','ผู้อนุมัติ'],
                [4,'Head','หัวหน้าแผนก'],
                [5,'User Demo','ผู้ใช้งาน ทดสอบ'],
                [6,'User','ผู้ใช้งาน'],
            ]
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%user}}');
    }
}
