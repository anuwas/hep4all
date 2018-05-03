<?php

/**
 * This is the model class for table "template_email_history".
 *
 * The followings are the available columns in table 'template_email_history':
 * @property integer $tehid
 * @property integer $user_id
 * @property integer $print_master_id
 * @property integer $print_master_code_id
 * @property string $code
 * @property string $to_email
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property PrintMasterCode $printMasterCode
 * @property PrintMaster $printMaster
 * @property Users $user
 */
class TemplateEmailHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'template_email_history';
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
			array('user_id, print_master_id, print_master_code_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>50),
			array('to_email', 'length', 'max'=>155),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tehid, user_id, print_master_id, print_master_code_id, code, to_email, created_date', 'safe', 'on'=>'search'),
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
			'printMasterCode' => array(self::BELONGS_TO, 'PrintMasterCode', 'print_master_code_id'),
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
			'tehid' => 'Tehid',
			'user_id' => 'User',
			'print_master_id' => 'Print Master',
			'print_master_code_id' => 'Print Master Code',
			'code' => 'Code',
			'to_email' => 'To Email',
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

		$criteria->compare('tehid',$this->tehid);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('print_master_id',$this->print_master_id);
		$criteria->compare('print_master_code_id',$this->print_master_code_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('to_email',$this->to_email,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TemplateEmailHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
