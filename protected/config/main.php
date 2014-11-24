<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Big Master',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(

        'admin',
		// uncomment the following to enable the Gii tool
		/*  */
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
            'class'=>'WebUser',//这个WebUser是继承CwebUser，稍后给出它的代码
            'stateKeyPrefix'=>'member',//这个是设置前台session的前缀
            'allowAutoLogin'=>true,//这里设置允许cookie保存登录信息，一边下次自动登录
		),
        'admin'=>array(
            // enable cookie-based authentication
            'class'=>'AdminWebUser',
            'stateKeyPrefix'=>'admin',//设置后台session前缀
            'allowAutoLogin'=>false,
            'loginUrl' =>array('/admin/default/login'),
        ),
		// uncomment the following to enable URLs in path-format
		/**/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			/*'rules'=>array(
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),*/
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=phpextjs_stndart',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',//认证类名称
            'defaultRoles'=>array('guest'),//默认角色
            'itemTable' => 'AuthItem',//认证项表名称
            'itemChildTable' => 'AuthItemChild',//认证项父子关系
            'assignmentTable' => 'AuthItem',//认证项赋权关系
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,notice',
				),
				// uncomment the following to show log messages on web pages
                /*
				array(
					'class'=>'CWebLogRoute',
				),*/

			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);