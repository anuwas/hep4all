<?php
class ProductController extends Controller
{
	public function actionAdd()
	{
		$allcategory=ProductCategory::model()->findAll();
		$model=new Product;
		if(isset($_POST['Product']))
		{
			$product_image = $model->product_image;
			$model->attributes=$_POST['Product'];
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon1=CUploadedFile::getInstance($model,'product_image');
			if($uploadedFile_app_icon1)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon1}";
				$model->product_image = $fileName_icon;
				$uploadedFile_app_icon1->saveAs(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$image_thumb = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$image_thumb->resize(182, 162);
				$image_thumb->save(Yii::app()->basePath.'/../upload/product/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/product/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/product/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/product/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/product/50x50/'.$fileName_icon);
			}
			else
			{
				if($product_image)
				{
					$model->product_image = $product_image;
				}
				else 
				{
					$model->product_image = 'noimage.jpg';
				}
				
			}
			if($model->save())
				$this->redirect(array('manage'));
		}
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$productcategory=ProductCategory::model()->findAll();
		$this->render('add_product',array('model'=>$user,'productcategory'=>$productcategory,'allcategory'=>$allcategory));
	}
	
	public function actionEdit($id)
	{
		$model=Product::model()->findByPk($id);
		if(isset($_POST['Product']))
		{
			$product_image = $model->product_image;
			$model->attributes=$_POST['Product'];
			$rnd  = rand(0,9999);
			$uploadedFile_app_icon1=CUploadedFile::getInstance($model,'product_image');
			if($uploadedFile_app_icon1)
			{
				$fileName_icon = "{$rnd}-{$uploadedFile_app_icon1}";
				$model->product_image = $fileName_icon;
				$uploadedFile_app_icon1->saveAs(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$image_thumb = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$image_thumb->resize(182, 162);
				$image_thumb->save(Yii::app()->basePath.'/../upload/product/thumb/'.$fileName_icon);
				
				$S537x480 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S537x480->resize(537, 480);
				$S537x480->save(Yii::app()->basePath.'/../upload/product/537x480/'.$fileName_icon);
				
				$S202x180 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S202x180->resize(202, 180);
				$S202x180->save(Yii::app()->basePath.'/../upload/product/202x180/'.$fileName_icon);
				
				$S104x92 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S104x92->resize(104, 92);
				$S104x92->save(Yii::app()->basePath.'/../upload/product/104x92/'.$fileName_icon);
				
				$S50x50 = Yii::app()->image->load(Yii::app()->basePath.'/../upload/product/'.$fileName_icon);
				$S50x50->resize(50, 50);
				$S50x50->save(Yii::app()->basePath.'/../upload/product/50x50/'.$fileName_icon);
			}
			else
			{
				if($product_image)
				{
					$model->product_image = $product_image;
				}
				else 
				{
					$model->product_image = 'noimage.jpg';
				}
				
			}
			if($model->save())
				$this->redirect(array('manage'));
		}
		
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$productcategory=ProductCategory::model()->findAll();
		$this->render('edit_product',array('model'=>$user,'product'=>$model,'productcategory'=>$productcategory));
	}
	
	public function actionDeleteproduct($id)
	{
		Product::model()->findByPk($id)->delete();
		$this->redirect(array('manage'));
	}
	
	public function actionManage()
	{
		$allcategory=ProductCategory::model()->findAll();
		$userid=Yii::app()->session['user_id'];
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$productcategory=ProductCategory::model()->findAll();
		$criteria = new CDbCriteria;
		//$criteria->condition="user_id=$userid";
		if(isset($_POST))
		{
			if(isset($_REQUEST['search_manage_exercise']))
			{
				$criteria->compare('product_name',$_REQUEST['search_manage_exercise'],true);
			}
			if(isset($_REQUEST['search_manage_exercise_category']))
			{
				$criteria->compare('category_id',$_REQUEST['search_manage_exercise_category'],true);
			}
		}
		$count=Product::model()->count($criteria);
		
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
		$products=Product::model()->findAll($criteria);
		$this->render('manage_product',array('model'=>$user,'products'=>$products,'pages'=>$pages,'productcategory'=>$productcategory,'allcategory'=>$allcategory));
	}
	
	
	
	public function actionDetail($id)
	{
		$userid=Yii::app()->session['user_id'];
		$allcategory=ProductCategory::model()->findAll();
		$criteria = new CDbCriteria;
		$criteria->order = 'serial ASC';
		$criteria->condition="t.user_id=$userid";
		$printexercise=PrintExercise::model()->with('exercise')->findAll($criteria);
		$product=Product::model()->findByPk($id);
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$this->render('product_detail',array('model'=>$user,'product'=>$product,'allcategory'=>$allcategory));
	}
	
	public function actionProducts()
	{
		$userid=Yii::app()->session['user_id'];
		$allcategory=ProductCategory::model()->findAll();
		$criteria = new CDbCriteria;
		$count=Product::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=16;
    	$pages->applyLimit($criteria);
		$products=Product::model()->findAll($criteria);
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$this->render('products',array('model'=>$user,'products'=>$products,'allcategory'=>$allcategory,'pages'=>$pages));
	}
	
	public function actionSearch()
	{
		$allcategory=ProductCategory::model()->findAll();
		
		$search_option=$_REQUEST['search_option'];
		$search_text=$_REQUEST['search_text'];
		
		$userid=Yii::app()->session['user_id'];
				
		$criteria = new CDbCriteria;
		if($search_option=='All')
		{
			if($search_text)
			{
				$criteria->addSearchCondition('product_name', $search_text);
			}
			
		}
		else 
		{
			if($search_text)
			{
				$criteria->addSearchCondition('product_name', $search_text);
				$criteria->condition="category_id=$search_option";
			}
			else 
			{
				$criteria->condition="category_id=$search_option";
			}
		}
		
		
		$count=Product::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=20;
    	$pages->applyLimit($criteria);
		$products=Product::model()->findAll($criteria);
		
		
		$user=Users::model()->findByPk(array('user_id'=>$userid));
		$this->render('products',array('model'=>$user,'products'=>$products,'allcategory'=>$allcategory,'pages'=>$pages));
		
	}
}