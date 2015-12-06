<?php

/**
 * This is the model class for table "{{articles}}".
 * @package application.models
 *
 * The followings are the available columns in table '{{articles}}':
 * @property integer $id
 * @property string $title
 * @property string $aticle
 * @property string $description
 * @property string $created_at
 * @property string $imj
 */
class Articles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Articles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{articles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title, aticle, description, created_at', 'required'),
			array('title, imj', 'length', 'max'=>50),
			// The following rule is used by search().
			array('id, title, aticle, description, created_at, imj', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Returns a list of behaviors that this model should behave as.
	 * The return value should be an array of behavior configurations indexed by
	 * behavior names.
	 *
	 * For more details about behaviors, see {@link CComponent}.
	 * @return array the behavior configurations (behavior name=>behavior configuration)
	 * @since 1.0.2
	 */
	public function behaviors()
	{
		return array();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'aticle' => Yii::t('app', 'Aticle'),
			'description' => Yii::t('app', 'Description'),
			'created_at' => Yii::t('app', 'Created At'),
			'imj' => Yii::t('app', 'Imj'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('aticle', $this->aticle, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('imj', $this->imj, true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageVar' => 'page',
				//'pageSize' => 25,
			),
			'sort' => array(
				'sortVar' => 'sort',
				//'defaultOrder' => '',
			),
		));
	}
}