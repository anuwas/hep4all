<?php
/* @var $this ExercisecategorymasterController */
/* @var $model ExerciseCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Category Masters'=>array('index'),
	$model->exercise_category_id,
);

$this->menu=array(
	array('label'=>'List ExerciseCategoryMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseCategoryMaster', 'url'=>array('create')),
	array('label'=>'Update ExerciseCategoryMaster', 'url'=>array('update', 'id'=>$model->exercise_category_id)),
	array('label'=>'Delete ExerciseCategoryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->exercise_category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>View ExerciseCategoryMaster #<?php echo $model->exercise_category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'exercise_category_id',
		'exercise_category_name',
		'created_date',
	),
)); ?>
