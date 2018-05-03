<?php
/* @var $this OccupationmasterController */
/* @var $model OccupationMaster */

$this->breadcrumbs=array(
	'Occupation Masters'=>array('index'),
	$model->occupation_id,
);

$this->menu=array(
	array('label'=>'List OccupationMaster', 'url'=>array('index')),
	array('label'=>'Create OccupationMaster', 'url'=>array('create')),
	array('label'=>'Update OccupationMaster', 'url'=>array('update', 'id'=>$model->occupation_id)),
	array('label'=>'Delete OccupationMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->occupation_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OccupationMaster', 'url'=>array('admin')),
);
?>

<h1>View OccupationMaster #<?php echo $model->occupation_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'occupation_id',
		'occupation_name',
		'created_date',
	),
)); ?>
