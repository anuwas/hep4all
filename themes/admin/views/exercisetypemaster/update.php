<?php
/* @var $this ExercisetypemasterController */
/* @var $model ExerciseTypeMaster */

$this->breadcrumbs=array(
	'Exercise Type Masters'=>array('index'),
	$model->exercise_type_id=>array('view','id'=>$model->exercise_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExerciseTypeMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseTypeMaster', 'url'=>array('create')),
	array('label'=>'View ExerciseTypeMaster', 'url'=>array('view', 'id'=>$model->exercise_type_id)),
	array('label'=>'Manage ExerciseTypeMaster', 'url'=>array('admin')),
);
?>

<h1>Update ExerciseTypeMaster <?php echo $model->exercise_type_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>