<?php
/* @var $this ExercisetypemasterController */
/* @var $model ExerciseTypeMaster */

$this->breadcrumbs=array(
	'Exercise Type Masters'=>array('index'),
	$model->exercise_type_id,
);

$this->menu=array(
	array('label'=>'List ExerciseTypeMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseTypeMaster', 'url'=>array('create')),
	array('label'=>'Update ExerciseTypeMaster', 'url'=>array('update', 'id'=>$model->exercise_type_id)),
	array('label'=>'Delete ExerciseTypeMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->exercise_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseTypeMaster', 'url'=>array('admin')),
);
?>

<h1>View ExerciseTypeMaster #<?php echo $model->exercise_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'exercise_type_id',
		'exercise_type_name',
		'created_date',
	),
)); ?>
