<?php
/* @var $this CountrymasterController */
/* @var $model CountryMaster */

$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CountryMaster', 'url'=>array('index')),
	array('label'=>'Create CountryMaster', 'url'=>array('create')),
	array('label'=>'Update CountryMaster', 'url'=>array('update', 'id'=>$model->country_id)),
	array('label'=>'Delete CountryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->country_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>View CountryMaster #<?php echo $model->country_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'country_id',
		'name',
		'iso_code_2',
		'iso_code_3',
		'postcode_required',
		'status',
	),
)); ?>
