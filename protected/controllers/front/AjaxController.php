<?php

class AjaxController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	
	public function actionExerciseserach()
	{
		$exstr='';
		$exercisename=addslashes($_POST["keyword"]);
		
		//echo $exstr;
		$criteria = new CDbCriteria();
		//$criteria->addSearchCondition('exercise_title', $exercisename);
		$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
		$criteria->condition="$exstr";       // no quotes around :match
		//$criteria->order = 'exercise_title ASC';
		//$criteria->limit = 10;
		$comments = Exercises::model()->findAll($criteria);
		if(sizeof($comments)==0){
			$exstr='';
			$exnamearr=explode(" ", $exercisename);
			foreach ($exnamearr as $value) {
			if($value!=''){
				if($exstr==''){
					$exstr.='exercise_title LIKE \'%'.$value.'%\'';
				}else{
					$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
				}
			}
		}
		
		$criteria->condition="$exstr";       // no quotes around :match
		//$criteria->order = 'exercise_title ASC';
		//$criteria->limit = 10;
		$comments = Exercises::model()->findAll($criteria);
		}
		
	if(!empty($comments)) {
?>
<ul id="country-list">
<?php
foreach($comments as $country) {
?>
<li onClick="selectCountry('<?php echo addslashes($country->exercise_title); ?>');"><?php echo $country->exercise_title; ?></li>
<?php } ?>
</ul>
<?php } 
	}
	
	
	public function actionManageexerciseserach()
	{
		$exstr='';
	    $userid=Yii::app()->session['user_id'];
	    $exercisename=addslashes($_POST["keyword"]);
	    
	    $exnamearr=explode(" ", $exercisename);
	    $exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
		$criteria = new CDbCriteria();
		$criteria->condition="user_id=$userid";
		//$criteria->addSearchCondition('exercise_title', $exercisename);
		$criteria->condition="$exstr"; 
		//$criteria->order = 'exercise_title ASC';
		//$criteria->limit = 10;
		$comments = Exercises::model()->findAll($criteria);
		if(sizeof($comments)==0){
			$exstr='';
			foreach ($exnamearr as $value) {
				if($value!=''){
					if($exstr==''){
						$exstr.='exercise_title LIKE \'%'.$value.'%\'';
					}else{
						$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
					}
				}
			}
			$criteria->condition="$exstr"; 
			//$criteria->order = 'exercise_title ASC';
			//$criteria->limit = 10;
			$comments = Exercises::model()->findAll($criteria);
		}
		
	if(!empty($comments)) {
	?>
	<ul id="mx_country-list">
	<?php
	foreach($comments as $country) {
	?>
	<li onClick="selectMxCountry('<?php echo addslashes($country->exercise_title); ?>');"><?php echo $country->exercise_title; ?></li>
	<?php } ?>
	</ul>
	<?php } 
	}
	
}