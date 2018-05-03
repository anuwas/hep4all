<?php
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
class UserController extends Controller
{
	public function actionIndex()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('index',array('model'=>$user));
	}
	
	public function actionAddexercise()
	{
		include 'vimeovideo/Vimeo/Vimeo.php';
		include 'vimeovideo/Vimeo/Exceptions/ExceptionInterface.php';
		include 'vimeovideo/Vimeo/Exceptions/VimeoUploadException.php';
		$config = require('vimeovideo/init.php');
		
		$lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
		
		$uploaded = array();
		$videoid_1='';
		$videoid_2='';
		$model=new Exercises;
		if(isset($_POST['Exercises']))
		{
			$model->attributes=$_POST['Exercises'];
			$image_before_post1 = $model->picture_1;
			$image_before_post2 = $model->picture_2;
			$video_before_post1 = $model->video_1;
			$video_before_post2 = $model->video_2;
			
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon1=CUploadedFile::getInstance($model,'picture_1');
			if($uploadedFile_app_icon1)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon1}";
				$model->picture_1 = $fileName_icon;
				$uploadedFile_app_icon1->saveAs(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image_thumb = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image_thumb->resize(182, 162);
				$image_thumb->save(Yii::app()->basePath.'/../upload/exercise/image/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/exercise/image/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/exercise/image/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/exercise/image/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/exercise/image/50x50/'.$fileName_icon);
			}
			else
			{
				if($image_before_post1)
				{
					$model->picture_1 = $image_before_post1;
				}
				else 
				{
					$model->picture_1 = 'noimage.jpg';
				}
				
			}
			
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon2=CUploadedFile::getInstance($model,'picture_2');
			if($uploadedFile_app_icon2)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon2}";
				$model->picture_2 = $fileName_icon;
				$uploadedFile_app_icon2->saveAs(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image->resize(182, 162);
				$image->save(Yii::app()->basePath.'/../upload/exercise/image/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/exercise/image/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/exercise/image/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/exercise/image/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/exercise/image/50x50/'.$fileName_icon);
			}
			else
			{
				if($image_before_post2)
				{
					$model->picture_2 = $image_before_post2;
				}
				else
				{
					$model->picture_2 = 'noimage.jpg';
				}
				
			}
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon3=CUploadedFile::getInstance($model,'video_1');
			if($uploadedFile_app_icon3)
			{
				$fileName_icon = $_POST['Exercises']['exercise_title'].'1'.'.mp4';
				$vimeovideoname=$_POST['Exercises']['exercise_title'].'1';
				
				$uploadedFile_app_icon3->saveAs(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
				chmod(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon, 0777);
				$file_name=Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon;
				$uri = $lib->upload($file_name);
				$video_data = $lib->request($uri);
				$lib->request($uri, array('name' =>$vimeovideoname), 'PATCH');
				$link = '';
		        if($video_data['status'] == 200) {
		            $link = $video_data['body']['link'];
		            $arr=explode("/", $link);
		            $videoid_1=$arr[3];
		            $model->video_1 = $videoid_1;
		            unlink(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
		        }
		        
			}
			else
			{
				if($video_before_post1)
				{
					$model->video_1 = $video_before_post1;
				}
				else
				{
					$model->video_1 = 'sample.mp4';
				}
				
			}
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon4=CUploadedFile::getInstance($model,'video_2');
			if($uploadedFile_app_icon4)
			{
				$fileName_icon = $_POST['Exercises']['exercise_title'].'2'.'.mp4';
				$vimeovideoname=$_POST['Exercises']['exercise_title'].'2';
				
				$uploadedFile_app_icon4->saveAs(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
				chmod(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon, 0777);
				$file_name=Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon;
				$uri = $lib->upload($file_name);
				$video_data = $lib->request($uri);
				$lib->request($uri, array('name' =>$vimeovideoname), 'PATCH');
				$link = '';
		        if($video_data['status'] == 200) {
		            $link = $video_data['body']['link'];
		            $arr=explode("/", $link);
		            $videoid_2=$arr[3];
		            $model->video_2 = $videoid_2;
		            unlink(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
		        }
			}
			else
			{
				if($video_before_post1)
				{
					$model->video_2 = $video_before_post1;
				}
				else 
				{
					$model->video_2 = 'sample.mp4';
				}
				
			}
			
			$subcategory='';
			$disclosure='';
			if(isset($_REQUEST['sub_category']))
			{
				$subcategory=implode(",", $_REQUEST['sub_category']);
			}
			
			if(isset($_REQUEST['disclosure']))
			{
			$disclosure=implode(",", $_REQUEST['disclosure']);
			}
			$model->sub_category=$subcategory;
			$model->disclosure=$disclosure;
			$model->description=trim($_REQUEST['Exercises']['description']);
			if($model->save())
			
			
			$this->redirect(array('manageexercise'));
			
		}
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$exercisetype=ExerciseTypeMaster::model()->findAll();
		$exercisecategory=ExerciseCategoryMaster::model()->findAll();
		$exercisesubcategory=ExerciseSubCategoryMaster::model()->findAll();
		$position=PositionMaster::model()->findAll();
		$this->render('add_exercise',array('model'=>$user,'exercisetype'=>$exercisetype,'exercisecategory'=>$exercisecategory,'exercisesubcategory'=>$exercisesubcategory,'position'=>$position));
	}
	
	public function actionEditexercise($id)
	{
		include 'vimeovideo/Vimeo/Vimeo.php';
		include 'vimeovideo/Vimeo/Exceptions/ExceptionInterface.php';
		include 'vimeovideo/Vimeo/Exceptions/VimeoUploadException.php';
		$config = require('vimeovideo/init.php');
		
		$lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
		
		$uploaded = array();
		$videoid_1='';
		$videoid_2='';
		
		$model=Exercises::model()->findByPk($id);
	if(isset($_POST['Exercises']))
		{
			$model->attributes=$_POST['Exercises'];
			$image_before_post1 = $model->picture_1;
			$image_before_post2 = $model->picture_2;
			$video_before_post1 = $model->video_1;
			$video_before_post2 = $model->video_2;
			
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon1=CUploadedFile::getInstance($model,'picture_1');
			if($uploadedFile_app_icon1)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon1}";
				$model->picture_1 = $fileName_icon;
				$uploadedFile_app_icon1->saveAs(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image->resize(182, 162);
				$image->save(Yii::app()->basePath.'/../upload/exercise/image/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/exercise/image/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/exercise/image/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/exercise/image/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/exercise/image/50x50/'.$fileName_icon);
			}
			else
			{
				if($image_before_post1)
				{
					$model->picture_1 = $image_before_post1;
				}
				else 
				{
					$model->picture_1 = 'noimage.jpg';
				}
				
			}
			
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon2=CUploadedFile::getInstance($model,'picture_2');
			if($uploadedFile_app_icon2)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon2}";
				$model->picture_2 = $fileName_icon;
				$uploadedFile_app_icon2->saveAs(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$image->resize(182, 162);
				$image->save(Yii::app()->basePath.'/../upload/exercise/image/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/exercise/image/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/exercise/image/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/exercise/image/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/exercise/image/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/exercise/image/50x50/'.$fileName_icon);
			}
			else
			{
				if($image_before_post2)
				{
					$model->picture_2 = $image_before_post2;
				}
				else
				{
					$model->picture_2 = 'noimage.jpg';
				}
				
			}
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon3=CUploadedFile::getInstance($model,'video_1');
			if($uploadedFile_app_icon3)
			{
				/*
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon3}";
				$model->video_1 = $fileName_icon;
				$uploadedFile_app_icon3->saveAs(Yii::app()->basePath.'/../upload/exercise/video/'.$fileName_icon);
				*/
				$fileName_icon = $_POST['Exercises']['exercise_title'].'1'.'.mp4';
				$vimeovideoname=$_POST['Exercises']['exercise_title'].'1';
				$uploadedFile_app_icon3->saveAs(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
				$file_name=Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon;
				$uri = $lib->upload($file_name);
				$video_data = $lib->request($uri);
				$lib->request($uri, array('name' =>$vimeovideoname), 'PATCH');
				$link = '';
		        if($video_data['status'] == 200) {
		            $link = $video_data['body']['link'];
		            $arr=explode("/", $link);
		            $videoid_1=$arr[3];
		            $model->video_1 = $videoid_1;
		            unlink(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
		        }
			}
			else
			{
				if($video_before_post1)
				{
					$model->video_1 = $video_before_post1;
				}
				else
				{
					$model->video_1 = 'sample.mp4';
				}
				
			}
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon4=CUploadedFile::getInstance($model,'video_2');
			if($uploadedFile_app_icon4)
			{
				/*
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon4}";
				$model->video_2 = $fileName_icon;
				$uploadedFile_app_icon4->saveAs(Yii::app()->basePath.'/../upload/exercise/video/'.$fileName_icon);
				*/
				$fileName_icon = $_POST['Exercises']['exercise_title'].'2'.'.mp4';
				$vimeovideoname=$_POST['Exercises']['exercise_title'].'2';
				$uploadedFile_app_icon4->saveAs(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
				
				$file_name=Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon;
				$uri = $lib->upload($file_name);
				$video_data = $lib->request($uri);
				$lib->request($uri, array('name' =>$vimeovideoname), 'PATCH');
				$link = '';
		        if($video_data['status'] == 200) {
		            $link = $video_data['body']['link'];
		            $arr=explode("/", $link);
		            $videoid_2=$arr[3];
		            $model->video_2 = $videoid_2;
		            unlink(Yii::app()->basePath.'/../upload/vimeovideo/'.$fileName_icon);
		        }
			}
			else
			{
				if($video_before_post2)
				{
					$model->video_2 = $video_before_post2;
				}
				else 
				{
					$model->video_2 = 'sample.mp4';
				}
				
			}
			
			$subcategory='';
			$disclosure='';
			if(isset($_REQUEST['sub_category']))
			{
				$subcategory=implode(",", $_REQUEST['sub_category']);
			}
			
			if(isset($_REQUEST['disclosure']))
			{
			$disclosure=implode(",", $_REQUEST['disclosure']);
			}
			$model->sub_category=$subcategory;
			$model->disclosure=$disclosure;
			$model->description=trim($_REQUEST['Exercises']['description']);
			if($model->save())
			//$this->redirect(array('user/editexercise/'.$id));
			$this->redirect(array('manageexercise'));
			
			
		}
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$exercisetype=ExerciseTypeMaster::model()->findAll();
		$exercisecategory=ExerciseCategoryMaster::model()->findAll();
		$exercisesubcategory=ExerciseSubCategoryMaster::model()->findAll();
		$position=PositionMaster::model()->findAll();
		$this->render('edit_exercise',array('model'=>$user,'exercise'=>$model,'exercisetype'=>$exercisetype,'exercisecategory'=>$exercisecategory,'exercisesubcategory'=>$exercisesubcategory,'position'=>$position));
		
	}
	public function actionDeleteexercise($id)
	{
		Exercises::model()->findByPk($id)->delete();
		$this->redirect(array('manageexercise'));
	}
	public function actionDeletefavouriteexercise($id)
	{
		//Exercises::model()->findByPk($id)->delete();
		FavouriteExercise::model()->findByPk($id)->delete();
		$this->redirect(array('favouriteexcrcise'));
	}
	public function actionManageexercise()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		
		$criteria = new CDbCriteria;
		$criteria->condition="user_id=$userid";
		if(isset($_POST))
		{
			if(isset($_REQUEST['search_manage_exercise']))
			{
				$criteria->compare('exercise_title',$_REQUEST['search_manage_exercise'],true);
			}
			if(isset($_REQUEST['search_manage_exercise_category']))
			{
				$criteria->compare('main_category',$_REQUEST['search_manage_exercise_category'],true);
			}
		}
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
    
		$exercises=Exercises::model()->findAll($criteria);
		
		$this->render('manage_exercise',array('model'=>$user,'exercises'=>$exercises,'pages'=>$pages));
	}
	
	public function actionFavouriteexcrcise()
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		
		$criteria = new CDbCriteria;
		$criteria->condition="t.user_id=$userid";
		$count=FavouriteExercise::model()->count($criteria);
		$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
    
		$exercises=FavouriteExercise::model()->with('exercise')->findAll($criteria);
		
		$this->render('favourite_exercise',array('model'=>$user,'exercises'=>$exercises,'printexercise'=>$printexercise,'pages'=>$pages));
	}
	
	public function actionFavouritetemplate()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$templates=PrintMaster::model()->findAllByAttributes(array('user_id'=>$userid,'template_type'=>1));
		$this->render('favourite_template',array('model'=>$user,'templates'=>$templates));
	}
	
	public function actionProfile()
	{
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('profile',array('model'=>$user));
	}
	
	public function actionProfileedit()
	{
		$userid=Yii::app()->session['user_id'];
		$model=Users::model()->findByPk($userid);
		$oldpassword=$model->pass_word;
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$image_before_post = $model->profile_picture;
			$image_before_post_logo = $model->customer_logo;
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon=CUploadedFile::getInstance($model,'profile_picture');
			if($uploadedFile_app_icon)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon}";
				$model->profile_picture = $fileName_icon;
				$uploadedFile_app_icon->saveAs(Yii::app()->basePath.'/../upload/profile/'.$fileName_icon);
				$image = Yii::app()->image->load(Yii::app()->basePath.'/../upload/profile/'.$fileName_icon);
				$image->resize(196, 196);
				$image->save(Yii::app()->basePath.'/../upload/profile/thumb/'.$fileName_icon);
			}
			else
			{
				$model->profile_picture = $image_before_post;
			}
			
			$uploadedFile_app_icon_logo=CUploadedFile::getInstance($model,'customer_logo');
			if($uploadedFile_app_icon_logo)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon_logo}";
				$model->customer_logo = $fileName_icon;
				$uploadedFile_app_icon_logo->saveAs(Yii::app()->basePath.'/../upload/customerlogo/'.$fileName_icon);
				$image = Yii::app()->image->load(Yii::app()->basePath.'/../upload/customerlogo/'.$fileName_icon);
				$image->resize(196, 121);
				$image->save(Yii::app()->basePath.'/../upload/customerlogo/thumb/'.$fileName_icon);
			}
			else
			{
				$model->customer_logo = $image_before_post_logo;
			}
			
			if($_REQUEST['Users']['pass_word']=='')
			{
				$model->pass_word=$oldpassword;
			}
			
			
			if($model->save())
			$this->redirect(array('profile'));
		}
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$occupation=OccupationMaster::model()->findAll();
		$working_setting=WorkSetting::model()->findAll();
		$country=CountryMaster::model()->findAll();
		$this->render('profile_edit',array('model'=>$user,'occupation'=>$occupation,'working_setting'=>$working_setting,'country'=>$country));
	}
	
	public function actionExercisedetail($id)
	{
		
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$exercise=Exercises::model()->findByPk($id);
		
		$criteria = new CDbCriteria;
		$criteria->condition="main_category=$exercise->main_category AND position_id=$exercise->position_id AND exercise_access_type=2 AND exercise_id!=$id";
		$count=Exercises::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=4;
    	$pages->applyLimit($criteria);
    	
		$related=Exercises::model()->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercise_detail',array('model'=>$user,'exercise'=>$exercise,'printexercise'=>$printexercise,'related'=>$related,'pages'=>$pages));
	}
	
	public function actionDeletecustomerprofilelogo()
	{
		$type=$_REQUEST['type'];
		$userid=Yii::app()->session['user_id'];
		$users=Users::model()->findByPk($userid);
		switch($type)
		{
			case 'profile':
				unlink(Yii::getPathOfAlias('webroot').'/upload/profile/thumb/'.$users->profile_picture);
				unlink(Yii::getPathOfAlias('webroot').'/upload/profile/'.$users->profile_picture);
				$users->profile_picture='';
				
				break;
			case 'logo':
				unlink(Yii::getPathOfAlias('webroot').'/upload/customerlogo/thumb/'.$users->customer_logo);
				unlink(Yii::getPathOfAlias('webroot').'/upload/customerlogo/'.$users->customer_logo);
				$users->customer_logo='';
				break;
		}
		
		$users->save();
		$this->redirect(array('profileedit'));
	}
	
	public function actionExercises()
	{
		$userid=Yii::app()->session['user_id'];
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		
		$user=Users::model()->with('country_master','occupation_master','workSetting')->findByAttributes(array('user_id'=>$userid));
		$this->render('exercises',array('model'=>$user,'printexercise'=>$printexercise));
	}
	
	public function actionTestupload()
	{
		
		$output_dir = Yii::app()->basePath.'/../upload/';
	if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
            $RandomNum   = time();
            
            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.
         	//echo $ImageType;
         	
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
       	 	 
	       	 	 $ret[$NewImageName]= $output_dir.$NewImageName;
	       	 	//echo $ImageType;
    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
                $RandomNum   = time();
            
                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.
             
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                
                $ret[$NewImageName]= $output_dir.$NewImageName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
    		}
    	}
    }
    echo json_encode($ret);
}
	}
	
	public function actionTupload()
	{
		$this->render('testupload');
	}
}