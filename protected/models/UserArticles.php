<?php

/**
 * This is the model class for table "{{user_articles}}".
 * @package application.models
 *
 * The followings are the available columns in table '{{user_articles}}':
 * @property integer $user_id
 * @property integer $article_id
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Articles $article
 */
class UserArticles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserArticles the static model class
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
		return '{{user_articles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('user_id, article_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('user_id, article_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'article' => array(self::BELONGS_TO, 'Articles', 'article_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => Yii::t('app', 'User'),
			'article_id' => Yii::t('app', 'Article'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('article_id', $this->article_id);
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