<?php

/**
 * This is the model class for table "print_detail".
 *
 * The followings are the available columns in table 'print_detail':
 * @property integer $print_detail_id
 * @property integer $user_id
 * @property integer $exercise_id
 * @property integer $print_master_id
 * @property integer $serial
 * @property integer $photo_number
 * @property integer $perform
 * @property string $times
 * @property integer $complete_set
 * @property integer $reps
 * @property string $hold
 * @property string $routene_name
 * @property string $created
 * @property string $description
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Exercises $exercise
 * @property PrintMaster $printMaster
 * @property Users $user
 */
class PrintDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'print_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('created_date', 'required'),
			array('user_id, exercise_id, print_master_id, serial, photo_number, perform, complete_set, reps', 'numerical', 'integerOnly'=>true),
			array('times, hold', 'length', 'max'=>50),
			array('routene_name', 'length', 'max'=>155),
			array('created, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('print_detail_id, user_id, exercise_id, print_master_id, serial, photo_number, perform, times, complete_set, reps, hold, routene_name, created, description, created_date', 'safe', 'on'=>'search'),
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
			'printMaster' => array(self::BELONGS_TO, 'PrintMaster', 'print_master_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'print_detail_id' => 'Print Detail',
			'user_id' => 'User',
			'exercise_id' => 'Exercise',
			'print_master_id' => 'Print Master',
			'serial' => 'Serial',
			'photo_number' => 'Photo Number',
			'perform' => 'Perform',
			'times' => 'Times',
			'complete_set' => 'Complete Set',
			'reps' => 'Reps',
			'hold' => 'Hold',
			'routene_name' => 'Routene Name',
			'created' => 'Created',
			'description' => 'Description',
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

		$criteria->compare('print_detail_id',$this->print_detail_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('print_master_id',$this->print_master_id);
		$criteria->compare('serial',$this->serial);
		$criteria->compare('photo_number',$this->photo_number);
		$criteria->compare('perform',$this->perform);
		$criteria->compare('times',$this->times,true);
		$criteria->compare('complete_set',$this->complete_set);
		$criteria->compare('reps',$this->reps);
		$criteria->compare('hold',$this->hold,true);
		$criteria->compare('routene_name',$this->routene_name,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrintDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
