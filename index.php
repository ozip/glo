<?php

if(isset($_SERVER['APPLICATION_ENV'])){
	if($_SERVER['APPLICATION_ENV'] == 'dev'){

		$yii=dirname(__FILE__).'/../yii-1.1.13/framework/yii.php';

		defined('YII_DEBUG') or define('YII_DEBUG',true);
		// specify how many levels of call stack should be shown in each log message
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

	}elseif ($_SERVER['APPLICATION_ENV'] == 'beta'){

		$yii=dirname(__FILE__).'/../yii/framework/yii.php';

		defined('YII_DEBUG') or define('YII_DEBUG',true);
		// specify how many levels of call stack should be shown in each log message
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

	}else if($_SERVER['APPLICATION_ENV'] == 'prod'){
		$yii=dirname(__FILE__).'/../yii/framework/yii.php';
	}
}else{
	echo "Please set APPLICATION_ENV";
	exit;
}

define('APPLICATION_ENV', $_SERVER['APPLICATION_ENV']);

$config=dirname(__FILE__).'/protected/config/main.'.APPLICATION_ENV.'.php';

require_once($yii);
Yii::createWebApplication($config)->run();