<?php
/**
 * This is the template for generating a form script file.
 * The following variables are available in this template:
 * - $this: the FormCode object
 */

echo "<?php

\$form = \$this->beginWidget('bootstrap.TbActiveForm', array(
	'id' => '".$this->class2id($this->modelClass).'-'.basename($this->viewName)."-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	//'htmlOptions' => array('class'=>'well'),
)); ?>\n"; ?>

	<?php echo "<?php //echo \$form->errorSummary(\$model); ?>\n"; ?>

	<fieldset><?php echo "<?php\n";

		foreach($this->tableSchema->columns as $column)
		{
			if($column->isPrimaryKey)
				continue;
			echo "\t\techo " . $this->generateActiveField($this->modelClass, $column) . ";\n";
		}

?>
		?><div class="control-group">
			<div class="controls">
				<div class="help-block"><?php echo "<?php
					echo Yii::t('app', 'Fields with <span class=\"required\">*</span> are required.');
				?>"; ?></div>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<?php echo "<?php"; ?> echo CHtml::htmlButton(($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')), array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		<?php echo "<?php"; ?> echo CHtml::link(Yii::t('app', 'Cancel'), array('index'), array('class'=>'btn')); ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>"; ?>