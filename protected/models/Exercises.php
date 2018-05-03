<?php

/**
 * This is the model class for table "exercises".
 *
 * The followings are the available columns in table 'exercises':
 * @property integer $exercise_id
 * @property integer $user_id
 * @property integer $exercise_access_type
 * @property integer $exercise_type_id
 * @property string $exercise_title
 * @property integer $main_category
 * @property string $sub_category
 * @property integer $position_id
 * @property string $description
 * @property integer $favourite
 * @property string $picture_1
 * @property string $picture_2
 * @property string $video_1
 * @property string $video_2
 * @property string $disclosure
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property ExerciseTypeMaster $exerciseType
 * @property ExerciseCategoryMaster $mainCategory
 * @property PositionMaster $position
 * @property Users $user
 * @property FavouriteExercise[] $favouriteExercises
 * @property PrintExercise[] $printExercises
 */
class Exercises extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exercises';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, exercise_access_type, exercise_type_id, main_category, position_id, favourite', 'numerical', 'integerOnly'=>true),
			array('exercise_title, sub_category, picture_1, picture_2, video_1, video_2,productlink', 'length', 'max'=>155),
			array('description, disclosure', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('exercise_id, user_id, exercise_access_type, exercise_type_id, exercise_title, main_category, sub_category, position_id, description, favourite, picture_1, picture_2, video_1, video_2, disclosure, created_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'exerciseType' => array(self::BELONGS_TO, 'ExerciseTypeMaster', 'exercise_type_id'),
			'mainCategory' => array(self::BELONGS_TO, 'ExerciseCategoryMaster', 'main_category'),
			'position' => array(self::BELONGS_TO, 'PositionMaster', 'position_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'favouriteExercises' => array(self::HAS_MANY, 'FavouriteExercise', 'exercise_id'),
			'printExercises' => array(self::HAS_MANY, 'PrintExercise', 'exercise_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'exercise_id' => 'Exercise',
			'user_id' => 'User',
			'exercise_access_type' => 'Exercise Access Type',
			'exercise_type_id' => 'Exercise Type',
			'exercise_title' => 'Exercise Title',
			'main_category' => 'Main Category',
			'sub_category' => 'Sub Category',
			'position_id' => 'Position',
			'description' => 'Description',
			'favourite' => 'Favourite',
			'picture_1' => 'Picture 1',
			'picture_2' => 'Picture 2',
			'video_1' => 'Video 1',
			'video_2' => 'Video 2',
			'disclosure' => 'Disclosure',
			'productlink' => 'Productlink',
			'created_date' => 'Created Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('exercise_access_type',$this->exercise_access_type);
		$criteria->compare('exercise_type_id',$this->exercise_type_id);
		$criteria->compare('exercise_title',$this->exercise_title,true);
		$criteria->compare('main_category',$this->main_category);
		$criteria->compare('sub_category',$this->sub_category,true);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('favourite',$this->favourite);
		$criteria->compare('picture_1',$this->picture_1,true);
		$criteria->compare('picture_2',$this->picture_2,true);
		$criteria->compare('video_1',$this->video_1,true);
		$criteria->compare('video_2',$this->video_2,true);
		$criteria->compare('productlink',$this->productlink,true);
		
		$criteria->compare('disclosure',$this->disclosure,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Exercises the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
