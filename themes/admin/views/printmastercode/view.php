<?php
/* @var $this PrintmastercodeController */
/* @var $model PrintMasterCode */

$this->breadcrumbs=array(
	'Print Master Codes'=>array('index'),
	$model->print_master_code_id,
);

$this->menu=array(
	array('label'=>'List PrintMasterCode', 'url'=>array('index')),
	array('label'=>'Create PrintMasterCode', 'url'=>array('create')),
	array('label'=>'Update PrintMasterCode', 'url'=>array('update', 'id'=>$model->print_master_code_id)),
	array('label'=>'Delete PrintMasterCode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->print_master_code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrintMasterCode', 'url'=>array('admin')),
);
?>

<h1>View PrintMasterCode #<?php echo $model->print_master_code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'print_master_code_id',
		'print_master_id',
		'print_code',
		'created_date',
	),
)); ?>
