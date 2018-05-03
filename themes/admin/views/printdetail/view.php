<?php
/* @var $this PrintdetailController */
/* @var $model PrintDetail */

$this->breadcrumbs=array(
	'Print Details'=>array('index'),
	$model->print_detail_id,
);

$this->menu=array(
	array('label'=>'List PrintDetail', 'url'=>array('index')),
	array('label'=>'Create PrintDetail', 'url'=>array('create')),
	array('label'=>'Update PrintDetail', 'url'=>array('update', 'id'=>$model->print_detail_id)),
	array('label'=>'Delete PrintDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->print_detail_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrintDetail', 'url'=>array('admin')),
);
?>

<h1>View PrintDetail #<?php echo $model->print_detail_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'print_detail_id',
		'user_id',
		'exercise_id',
		'print_master_id',
		'serial',
		'photo_number',
		'perform',
		'times',
		'complete_set',
		'reps',
		'hold',
		'routene_name',
		'created',
		'description',
		'created_date',
	),
)); ?>
