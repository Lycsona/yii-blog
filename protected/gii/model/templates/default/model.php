<?php
/**
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
?>
<?php echo "<?php\n"; ?>

/**
 * This is the model class for table "<?php echo $tableName; ?>".
 * @package application.models
 *
 * The followings are the available columns in table '<?php echo $tableName; ?>':
<?php foreach($columns as $column): ?>
 * @property <?php echo $column->type.' $'.$column->name."\n"; ?>
<?php endforeach; ?>
<?php if(!empty($relations)): ?>
 *
 * The followings are the available model relations:
<?php foreach($relations as $name=>$relation): ?>
 * @property <?php

	if(preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
	{
		$relationType = $matches[1];
		$relationModel = $matches[2];

		switch($relationType){
            case 'HAS_ONE':
                echo $relationModel.' $'.$name."\n";
            	break;
            case 'BELONGS_TO':
                echo $relationModel.' $'.$name."\n";
            	break;
            case 'HAS_MANY':
                echo $relationModel.'[] $'.$name."\n";
            	break;
            case 'MANY_MANY':
                echo $relationModel.'[] $'.$name."\n";
            	break;
            default:
                echo 'mixed $'.$name."\n";
        }
	}

	?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?php echo $modelClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return <?php echo $modelClass; ?> the static model class
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
		return '<?php echo $tableName; ?>';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
<?php foreach($rules as $rule): ?>
			<?php echo $rule.",\n"; ?>
<?php endforeach; ?>
			// The following rule is used by search().
			array('<?php

				$safe = array();
				foreach($columns as $name=>$column)
				{
					if(strlen($column->defaultValue))
						continue;
					$safe[] = $name;
				}

				echo implode(', ', $safe);

			?>', 'safe', 'on'=>'search'),
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
<?php

	$_adv = array();

	foreach($relations as $name=>$relation)
	{
		foreach(array('HAS_ONE', 'HAS_MANY', 'MANY_MANY') as $_type)
		{
			if(strpos($relation, $_type) === false)
				continue;

			if(isset($_adv[$_type]))
				$_adv[$_type][] = $name;
			else
				$_adv[$_type] = array($name);
		}
	}

	if(!empty($_adv)): ?>
		return array(
			'AdvancedRelationsBehavior' => array(
				'class' => 'AdvancedRelationsBehavior',
				'relations' => array(
<?php foreach($_adv as $_type=>$_lst): ?>
					// <?php echo $_type; ?> relations
<?php foreach($_lst as $name): ?>
					'<?php echo $name; ?>',
<?php endforeach; ?>
<?php endforeach; ?>
				),
			),
		);
<?php else: ?>
		return array();
<?php endif; ?>
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
<?php foreach($relations as $name=>$relation): ?>
			<?php echo "'$name' => $relation,\n"; ?>
<?php endforeach; ?>
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
<?php foreach($labels as $name=>$label): ?>
<?php

		$label = preg_replace_callback('/\b(db|ip|pr|url|uri|ftp|xml|rpc|xmlrpc|html)\b/si', create_function(
			'$m', 'return strtoupper($m[1]);'
		), $label);

		$label = preg_replace('/\b(email)\b/si', 'E-mail', $label);

		echo "\t\t\t'$name' => Yii::t('app', '$label'),\n";
?>
<?php endforeach; ?>
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;
<?php foreach($columns as $name=>$column): ?>
<?php
		if(strlen($column->defaultValue))
			continue;
		if($column->type === 'string' && (strtolower($name) != 'id' && !preg_match('/(_id|Id)$/s', $name)))
			echo "\t\t\$criteria->compare('$name', \$this->$name, true);\n";
		else
			echo "\t\t\$criteria->compare('$name', \$this->$name);\n";
?>
<?php endforeach; ?>
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