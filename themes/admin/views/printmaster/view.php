<?php
/* @var $this PrintmasterController */
/* @var $model PrintMaster */

$this->breadcrumbs=array(
	'Print Masters'=>array('index'),
	$model->print_master_id,
);

$this->menu=array(
	array('label'=>'List PrintMaster', 'url'=>array('index')),
	array('label'=>'Create PrintMaster', 'url'=>array('create')),
	array('label'=>'Update PrintMaster', 'url'=>array('update', 'id'=>$model->print_master_id)),
	array('label'=>'Delete PrintMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->print_master_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrintMaster', 'url'=>array('admin')),
);
?>

<h1>View PrintMaster #<?php echo $model->print_master_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'print_master_id',
		'user_id',
		'print_master_name',
		'print_code',
		'print_date',
	),
)); ?>
