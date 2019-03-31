<?php
/* @var $this ExercisesubcategorymasterController */
/* @var $model ExerciseSubCategoryMaster */

$this->breadcrumbs=array(
	'Exercise Sub Category Masters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ExerciseSubCategoryMaster', 'url'=>array('index')),
	array('label'=>'Create ExerciseSubCategoryMaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exercise-sub-category-master-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exercise Sub Category Masters</h1>

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
	'id'=>'exercise-sub-category-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'exercise_sub_category_id',
		'exercise_sub_category_name',
		'created_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
