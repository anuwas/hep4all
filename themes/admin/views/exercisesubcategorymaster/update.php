<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $model ExerciseSubCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Sub Category Masters'=>array('index'),
	$model->exercise_sub_category_id=>array('view','id'=>$model->exercise_sub_category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExerciseSubCategoryMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseSubCategoryMaster', 'url'=>array('create')),
	array('label'=>'View ExerciseSubCategoryMaster', 'url'=>array('view', 'id'=>$model->exercise_sub_category_id)),
	array('label'=>'Manage ExerciseSubCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Update ExerciseSubCategoryMaster <?php echo $model->exercise_sub_category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>