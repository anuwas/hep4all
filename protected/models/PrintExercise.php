<?php

/**
 * This is the model class for table "print_exercise".
 *
 * The followings are the available columns in table 'print_exercise':
 * @property integer $print_id
 * @property integer $user_id
 * @property integer $exercise_id
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Exercises $exercise
 * @property Users $user
 */
class PrintExercise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'print_exercise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('user_id,exercise_id', 'required'),
			array('user_id, exercise_id,serial,photo_number,perform,complete_set,reps', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('times, routene_name,hold', 'length', 'max'=>155),
			array('description', 'safe'),
			array('print_id, user_id, exercise_id, created_date', 'safe', 'on'=>'search'),
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
			'print_id' => 'Print',
			'user_id' => 'User',
			'exercise_id' => 'Exercise',
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

		$criteria->compare('print_id',$this->print_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrintExercise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
