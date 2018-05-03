<?php
/* @var $this WorksettingController */
/* @var $model WorkSetting */

$this->breadcrumbs=array(
	'Work Settings'=>array('index'),
	$model->work_setting_id=>array('view','id'=>$model->work_setting_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WorkSetting', 'url'=>array('index')),
	array('label'=>'Create WorkSetting', 'url'=>array('create')),
	array('label'=>'View WorkSetting', 'url'=>array('view', 'id'=>$model->work_setting_id)),
	array('label'=>'Manage WorkSetting', 'url'=>array('admin')),
);
?>

<h1>Update WorkSetting <?php echo $model->work_setting_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>