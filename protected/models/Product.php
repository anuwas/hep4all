<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $product_id
 * @property integer $category_id
 * @property string $product_name
 * @property string $product_desc
 * @property double $price
 * @property string $product_image
 * @property string $product_link
 * @property string $creatged_date
 *
 * The followings are the available model relations:
 * @property ProductCategory $category
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_name', 'required'),
			array('category_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('product_name', 'length', 'max'=>30),
			array('product_image', 'length', 'max'=>50),
			array('product_desc, product_link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_id, category_id, product_name, product_desc, price, product_image, product_link, creatged_date', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'category_id' => 'Category',
			'product_name' => 'Product Name',
			'product_desc' => 'Product Desc',
			'price' => 'Price',
			'product_image' => 'Product Image',
			'product_link' => 'Product Link',
			'creatged_date' => 'Creatged Date',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_desc',$this->product_desc,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('product_image',$this->product_image,true);
		$criteria->compare('product_link',$this->product_link,true);
		$criteria->compare('creatged_date',$this->creatged_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
