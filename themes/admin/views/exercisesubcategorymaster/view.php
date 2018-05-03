<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $model ExerciseSubCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Sub Category Masters'=>array('index'),
	$model->exercise_sub_category_id,
);

$this->menu=array(
	array('label'=>'List ExerciseSubCategoryMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseSubCategoryMaster', 'url'=>array('create')),
	array('label'=>'Update ExerciseSubCategoryMaster', 'url'=>array('update', 'id'=>$model->exercise_sub_category_id)),
	array('label'=>'Delete ExerciseSubCategoryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->exercise_sub_category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseSubCategoryMaster', 'url'=>array('admin')),
);
?>

<h1>View ExerciseSubCategoryMaster #<?php echo $model->exercise_sub_category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'exercise_sub_category_id',
		'exercise_sub_category_name',
		'created_date',
	),
)); ?>
