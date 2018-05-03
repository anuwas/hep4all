<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> Administration</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrator', 'url'=>array('/administrator/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User', 'url'=>array('/users/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Exercises', 'url'=>array('/exercises/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Country', 'url'=>array('/countrymaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Occupation', 'url'=>array('/occupationmaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Work Setting', 'url'=>array('/worksetting/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Category', 'url'=>array('/exercisecategorymaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Sub Category', 'url'=>array('/exercisesubcategorymaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Exercise Type', 'url'=>array('/exercisetypemaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Position', 'url'=>array('/positionmaster/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Print Exercise', 'url'=>array('/printexercise/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Product Category', 'url'=>array('/productcategory/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'homeLink'=>($this->id == 'site')? CHtml::link('Home', Yii::app()->baseUrl): CHtml::link('Dashboard', Yii::app()->homeUrl),

			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name;?>.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
