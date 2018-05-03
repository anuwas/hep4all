<?php
/* @var $this WorksettingController */
/* @var $model WorkSetting */

$this->breadcrumbs=array(
	'Work Settings'=>array('index'),
	$model->work_setting_id,
);

$this->menu=array(
	array('label'=>'List WorkSetting', 'url'=>array('index')),
	array('label'=>'Create WorkSetting', 'url'=>array('create')),
	array('label'=>'Update WorkSetting', 'url'=>array('update', 'id'=>$model->work_setting_id)),
	array('label'=>'Delete WorkSetting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->work_setting_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WorkSetting', 'url'=>array('admin')),
);
?>

<h1>View WorkSetting #<?php echo $model->work_setting_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'work_setting_id',
		'working_setting_name',
		'creted_date',
	),
)); ?>
