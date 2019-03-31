<?php

/**
 * This is the model class for table "print_master_code".
 *
 * The followings are the available columns in table 'print_master_code':
 * @property integer $print_master_code_id
 * @property integer $print_master_id
 * @property string $print_code
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property PrintMaster $printMaster
 */
class PrintMasterCode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'print_master_code';
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
			array('print_master_id', 'numerical', 'integerOnly'=>true),
			array('print_code', 'length', 'max'=>155),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('print_master_code_id, print_master_id, print_code, created_date', 'safe', 'on'=>'search'),
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
			'printMaster' => array(self::BELONGS_TO, 'PrintMaster', 'print_master_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'print_master_code_id' => 'Print Master Code',
			'print_master_id' => 'Print Master',
			'print_code' => 'Print Code',
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

		$criteria->compare('print_master_code_id',$this->print_master_code_id);
		$criteria->compare('print_master_id',$this->print_master_id);
		$criteria->compare('print_code',$this->print_code,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrintMasterCode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
