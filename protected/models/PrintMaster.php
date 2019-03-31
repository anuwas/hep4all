<?php

/**
 * This is the model class for table "print_master".
 *
 * The followings are the available columns in table 'print_master':
 * @property integer $print_master_id
 * @property integer $user_id
 * @property string $print_master_name
 * @property string $print_code
 * @property string $print_date
 *
 * The followings are the available model relations:
 * @property PrintDetail[] $printDetails
 * @property PrintMasterCode[] $printMasterCodes
 */
class PrintMaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'print_master';
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
			array('user_id,template_type', 'numerical', 'integerOnly'=>true),
			array('print_master_name, print_code', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('print_master_id, user_id, print_master_name, print_code, print_date,template_type', 'safe', 'on'=>'search'),
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
			'printDetails' => array(self::HAS_MANY, 'PrintDetail', 'print_master_id','with'=>'exercise'),
			'printMasterCodes' => array(self::HAS_MANY, 'PrintMasterCode', 'print_master_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'print_master_id' => 'Print Master',
			'user_id' => 'User',
			'print_master_name' => 'Print Master Name',
			'print_code' => 'Print Code',
			'template_type'=>'Template Type',
			'print_date' => 'Print Date',
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

		$criteria->compare('print_master_id',$this->print_master_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('print_master_name',$this->print_master_name,true);
		$criteria->compare('print_code',$this->print_code,true);
		$criteria->compare('print_date',$this->print_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrintMaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
