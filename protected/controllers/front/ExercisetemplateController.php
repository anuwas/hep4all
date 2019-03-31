<?php
class ExercisetemplateController extends Controller
{
	public function actionSavetemplate()
	{
		$pintmaster=new PrintMaster();
		$pintmaster->print_code=$this->generateRandomString();
		$pintmaster->user_id=Yii::app()->session['user_id'];
		$pintmaster->print_master_name=$_REQUEST['routinename'];
		$pintmaster->template_type=1;
		$pintmaster->save();
		
		$printidarr=explode(",", $_REQUEST['printidarr']);
		foreach ($printidarr as $value) {
			$printexercise=PrintExercise::model()->findByPk($value);
			$printdetail=new PrintDetail();
			$printdetail->user_id=$printexercise->user_id;
			$printdetail->exercise_id=$printexercise->exercise_id;
			$printdetail->print_master_id=$pintmaster->print_master_id;
			$printdetail->serial=$printexercise->serial;
			$printdetail->photo_number=$printexercise->photo_number;
			$printdetail->perform=$printexercise->perform;
			$printdetail->times=$printexercise->times;
			$printdetail->complete_set=$printexercise->complete_set;
			$printdetail->reps=$printexercise->reps;
			$printdetail->hold=$printexercise->hold;
			$printdetail->routene_name=$printexercise->routene_name;
			$printdetail->description=$printexercise->description;
			$printdetail->created=$printexercise->created;
			$printdetail->save();
		}
		echo $pintmaster->print_master_id;
	}
	
	public function actionResetsliderforedittemplate()
	{
		$print_master_id=$_REQUEST['id'];
		$userid=Yii::app()->session['user_id'];
		
		//$printdetail=PrintDetail::model()->findAllByAttributes(array('print_detail_id'=>$print_master_id,'user_id'=>$userid));
		$printdetail=PrintDetail::model()->findAllByAttributes(array('print_master_id'=>$print_master_id,'user_id'=>$userid));
		
		PrintExercise::model()->deleteAll('user_id=:user_id',array(':user_id'=>$userid));
		foreach ($printdetail as $value) {
			$printexercise=new PrintExercise();
			$printexercise->user_id=$userid;
			$printexercise->exercise_id=$value->exercise_id;
			$printexercise->serial=$value->serial;
			$printexercise->photo_number=$value->photo_number;
			$printexercise->perform=$value->perform;
			$printexercise->times=$value->times;
			$printexercise->complete_set=$value->complete_set;
			$printexercise->reps=$value->reps;
			$printexercise->hold=$value->hold;
			$printexercise->routene_name=$value->routene_name;
			$printexercise->created=$value->created;
			$printexercise->description=$value->description;
			$printexercise->save();
		}
		
		//$this->redirect('exercise/index');
		//Yii::app()->request->redirect('exercise/index');
		Yii::app()->getController()->redirect(array('/exercise/index'));
		
	}
	
protected function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function actionDeletetemplate()
{
	$id=$_REQUEST['id'];
	
	
	$history=TemplateEmailHistory::model()->findByPk($id);
	$history->show_other_wall=0;
	$history->save();
	
	//$printDetail=PrintDetail::model()->deleteAllByAttributes(array('print_master_id'=>$id));
	//$templatehistory=TemplateEmailHistory::model()->deleteAllByAttributes(array('print_master_id'=>$id));
	//$printMaster=PrintMaster::model()->findByPk($id)->delete();
	//TemplateEmailHistory::model()->deleteByPk($id);
	
}

public function actionDeletefavouritetemplate(){
	$id=$_REQUEST['id'];
	$printDetail=PrintDetail::model()->deleteAllByAttributes(array('print_master_id'=>$id));
	$templatehistory=TemplateEmailHistory::model()->deleteAllByAttributes(array('print_master_id'=>$id));
	$printMaster=PrintMaster::model()->findByPk($id)->delete();
}

public function actionCreatehiddentemplatemaster()
{
		$pintmaster=new PrintMaster();
		$pintmaster->print_code=$this->generateRandomString();
		$pintmaster->user_id=Yii::app()->session['user_id'];
		$pintmaster->print_master_name='hidden';
		$pintmaster->save();
		$printidarr=explode(",", $_REQUEST['printidarr']);
		foreach ($printidarr as $value) {
			$printexercise=PrintExercise::model()->findByPk($value);
			$printdetail=new PrintDetail();
			$printdetail->user_id=$printexercise->user_id;
			$printdetail->exercise_id=$printexercise->exercise_id;
			$printdetail->print_master_id=$pintmaster->print_master_id;
			$printdetail->serial=$printexercise->serial;
			$printdetail->photo_number=$printexercise->photo_number;
			$printdetail->perform=$printexercise->perform;
			$printdetail->times=$printexercise->times;
			$printdetail->complete_set=$printexercise->complete_set;
			$printdetail->reps=$printexercise->reps;
			$printdetail->hold=$printexercise->hold;
			$printdetail->routene_name=$printexercise->routene_name;
			$printdetail->description=$printexercise->description;
			$printdetail->created=$printexercise->created;
			$printdetail->save();
		}
		
		echo $pintmaster->print_master_id;
}

}