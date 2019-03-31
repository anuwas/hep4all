<?php
class MembersearchController extends Controller{
	
	public function actionIndex()
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$search_text=$_REQUEST['search_text'];
		
		$criteria = new CDbCriteria;
		$exercisename=$search_text;
		if($search_text)
		{
			$exstr='';
			$exnamearr=explode(" ", $exercisename);
			if(sizeof($exnamearr)>0){
				foreach ($exnamearr as $value) {
					if($value!=''){
						if($exstr==''){
							$exstr.='exercise_title LIKE \'%'.$value.'%\'';
							}else{
								$exstr.=' AND exercise_title LIKE \'%'.$value.'%\'';
							}
						}
						}
					}
					else {
					$exstr.='exercise_title LIKE \'%'.$exercisename.'%\'';
					}
					
					$criteria->condition="exercise_access_type!=1 AND $exstr";
				}
				else 
				{
					$criteria->condition="exercise_access_type!=1";
				}
				//$count=Exercises::model()->with('')->count($criteria);
		$users=Users::model()->with('exercises')->findAll($criteria);
		$count=Users::model()->with('exercises')->count($criteria);
		$pages=new CPagination($count);
    	$pages->pageSize=20;
    	$pages->applyLimit($criteria);
    	
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('memberlist',array('model'=>$user,'printexercise'=>$printexercise,'users'=>$users,'pages'=>$pages));
	}
}