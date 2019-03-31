<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $pass_word
 * @property integer $active_inactive
 * @property string $title
 * @property string $years_of_exp
 * @property integer $occupation
 * @property integer $work_setting
 * @property string $city
 * @property string $state
 * @property integer $country
 * @property string $profile_picture
 * @property string $customer_logo
 * @property string $emailcode
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Exercises[] $exercises
 * @property FavouriteExercise[] $favouriteExercises
 * @property PrintExercise[] $printExercises
 * @property OccupationMaster $occupation0
 * @property WorkSetting $workSetting
 * @property CountryMaster $country0
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('active_inactive, occupation, work_setting, country', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>55),
			array('email, pass_word, years_of_exp, city, state, profile_picture, customer_logo, emailcode', 'length', 'max'=>155),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, email, pass_word, active_inactive, title, years_of_exp, occupation, work_setting, city, state, country, profile_picture, customer_logo, emailcode, created_date', 'safe', 'on'=>'search'),
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
			'exercises' => array(self::HAS_MANY, 'Exercises', 'user_id'),
			'favouriteExercises' => array(self::HAS_MANY, 'FavouriteExercise', 'user_id'),
			'printExercises' => array(self::HAS_MANY, 'PrintExercise', 'user_id'),
			'occupation_master' => array(self::BELONGS_TO, 'OccupationMaster', 'occupation'),
			'workSetting' => array(self::BELONGS_TO, 'WorkSetting', 'work_setting'),
			'country_master' => array(self::BELONGS_TO, 'CountryMaster', 'country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'pass_word' => 'Pass Word',
			'active_inactive' => 'Active Inactive',
			'title' => 'Title',
			'years_of_exp' => 'Years Of Exp',
			'occupation' => 'Occupation',
			'work_setting' => 'Work Setting',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'profile_picture' => 'Profile Picture',
			'customer_logo' => 'Customer Logo',
			'emailcode' => 'Emailcode',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass_word',$this->pass_word,true);
		$criteria->compare('active_inactive',$this->active_inactive);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('years_of_exp',$this->years_of_exp,true);
		$criteria->compare('occupation',$this->occupation);
		$criteria->compare('work_setting',$this->work_setting);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('profile_picture',$this->profile_picture,true);
		$criteria->compare('customer_logo',$this->customer_logo,true);
		$criteria->compare('emailcode',$this->emailcode,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
