<?php
class MembersController extends Controller{
	
	
	public function actionIndex($type=false)
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$criteria = new CDbCriteria;
		$criteria->condition="user_id!=''";
		
		
		
		$count=count(Users::model()->findAll($criteria));
		
		$pages=new CPagination($count);
    	$pages->pageSize=12;
    	$pages->applyLimit($criteria);
    	$users=Users::model()->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('memberlist',array('model'=>$user,'printexercise'=>$printexercise,'users'=>$users,'pages'=>$pages));
	}
	
	public function actionSearch($type=false)
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$search_text=$_REQUEST['membername'];
		
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
							$exstr.='t.first_name LIKE \'%'.$value.'%\' OR t.last_name LIKE \'%'.$value.'%\'';
							}else{
								$exstr.=' AND t.first_name LIKE \'%'.$value.'%\' OR t.last_name LIKE \'%'.$value.'%\'';
							}
						}
						}
					}
					else {
					$exstr.='t.first_name LIKE \'%'.$exercisename.'%\' OR last_name \'%'.$exercisename.'%\'';
					}
					
					$criteria->condition="t.user_id!='' AND $exstr";
				}
				else 
				{
					$criteria->condition="t.user_id!=''";
				}
				//$count=Exercises::model()->with('')->count($criteria);
		
		$count=Users::model()->count($criteria);
		$pages=new CPagination($count);
    	$pages->pageSize=12;
    	$pages->applyLimit($criteria);
    	$users=Users::model()->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('memberlist',array('model'=>$user,'printexercise'=>$printexercise,'users'=>$users,'pages'=>$pages));
	}
	
	public function actionProfile($id){
		$member=Users::model()->with('country_master')->findByPk($id);
		$this->render('profile',array('member'=>$member));
	}
	
	public function actionExercise($id){
		$userid=Yii::app()->session['user_id'];
		
		$member=Users::model()->with('country_master')->findByPk($id);
		
		$criteria = new CDbCriteria;
		$criteria->condition="user_id=$id";
		$count=Exercises::model()->count($criteria);
		$pages=new CPagination($count);
    	$pages->pageSize=12;
    	$pages->applyLimit($criteria);
    	$exercises=Exercises::model()->findAll($criteria);
    	
    	$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('memberexercise',array('model'=>$user,'member'=>$member,'exercises'=>$exercises,'pages'=>$pages));
	
	}
	
	public function actionFavoritexercise($id){
		$userid=Yii::app()->session['user_id'];
		
		$member=Users::model()->with('country_master')->findByPk($id);
		$criteria = new CDbCriteria;
		$criteria->condition="t.user_id=$id";
		$count=FavouriteExercise::model()->with('exercise','user')->count($criteria);
		$pages=new CPagination($count);
    	$pages->pageSize=12;
    	$pages->applyLimit($criteria);
		$exercises=FavouriteExercise::model()->with('exercise','user')->findAll($criteria);
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('membersfavouriteexercise',array('model'=>$user,'member'=>$member,'exercises'=>$exercises,'pages'=>$pages));
	}
}