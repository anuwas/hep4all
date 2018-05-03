<?php

class ExercisesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mycolumn';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Exercises;
		$exercisetypedb=ExerciseTypeMaster::model()->findAll();
		$exercisetype=array();
		foreach ($exercisetypedb as $value) {
			$exercisetype[$value->exercise_type_id]=$value->exercise_type_name;
		}
		$mancategorydb=ExerciseCategoryMaster::model()->findAll();
		$maincategory=array();
		foreach ($mancategorydb as $value) {
			$maincategory[$value->exercise_category_id]=$value->exercise_category_name;
		}
		
		$subcategorydb=ExerciseSubCategoryMaster::model()->findAll();
		$subcategory=array();
		foreach ($subcategorydb as $value) {
			$subcategory[$value->exercise_sub_category_id]=$value->exercise_sub_category_name;
		}
		
		$positiondb=PositionMaster::model()->findAll();
		$position=array();
		foreach ($positiondb as $value) {
			$position[$value->position_master_id]=$value->position_master_name;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

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
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon3}";
				$model->video_1 = $fileName_icon;
				$uploadedFile_app_icon3->saveAs(Yii::app()->basePath.'/../upload/exercise/video/'.$fileName_icon);
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
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon4}";
				$model->video_2 = $fileName_icon;
				$uploadedFile_app_icon4->saveAs(Yii::app()->basePath.'/../upload/exercise/video/'.$fileName_icon);
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
			$subcatarr=$_POST['Exercises']['sub_category'];
			$model->sub_category=implode(",", $subcatarr);
			
			if($model->save())
				//$this->redirect(array('view','id'=>$model->exercise_id));
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,'exercisetype'=>$exercisetype,'maincategory'=>$maincategory,
			'subcategory'=>$subcategory,'position'=>$position
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Exercises']))
		{
			$model->attributes=$_POST['Exercises'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->exercise_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Exercises');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Exercises('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Exercises']))
			$model->attributes=$_GET['Exercises'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Exercises the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Exercises::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Exercises $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='exercises-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
