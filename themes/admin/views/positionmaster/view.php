<?php
/* @var $this PositionmasterController */
/* @var $model PositionMaster */

$this->breadcrumbs=array(
	'Position Masters'=>array('index'),
	$model->position_master_id,
);

$this->menu=array(
	array('label'=>'List PositionMaster', 'url'=>array('index')),
	array('label'=>'Create PositionMaster', 'url'=>array('create')),
	array('label'=>'Update PositionMaster', 'url'=>array('update', 'id'=>$model->position_master_id)),
	array('label'=>'Delete PositionMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->position_master_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PositionMaster', 'url'=>array('admin')),
);
?>

<h1>View PositionMaster #<?php echo $model->position_master_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'position_master_id',
		'position_master_name',
		'created_date',
	),
)); ?>
