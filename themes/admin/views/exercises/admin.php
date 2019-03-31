<?php
/* @var $this ExercisesController */
/* @var $model Exercises */

$this->breadcrumbs=array(
	'Exercises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Exercises', 'url'=>array('index')),
	array('label'=>'Create Exercises', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exercises-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exercises</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exercises-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'exercise_id',
		'user_id',
		'exercise_access_type',
		'exercise_type_id',
		'exercise_title',
		'main_category',
		/*
		'sub_category',
		'position_id',
		'description',
		'favourite',
		'picture_1',
		'picture_2',
		'video_1',
		'video_2',
		'created_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
