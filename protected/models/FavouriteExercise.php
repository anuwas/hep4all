<?php

/**
 * This is the model class for table "favourite_exercise".
 *
 * The followings are the available columns in table 'favourite_exercise':
 * @property integer $favourite_id
 * @property integer $exercise_id
 * @property integer $user_id
 * @property integer $image_no
 *
 * The followings are the available model relations:
 * @property Exercises $exercise
 * @property Users $user
 */
class FavouriteExercise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'favourite_exercise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exercise_id, user_id, image_no', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('favourite_id, exercise_id, user_id, image_no', 'safe', 'on'=>'search'),
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
			'exercise' => array(self::BELONGS_TO, 'Exercises', 'exercise_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'favourite_id' => 'Favourite',
			'exercise_id' => 'Exercise',
			'user_id' => 'User',
			'image_no' => 'Image No',
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

		$criteria->compare('favourite_id',$this->favourite_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('image_no',$this->image_no);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FavouriteExercise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
