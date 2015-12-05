<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */

$nameColumn = $this->guessNameColumn($this->tableSchema->columns);

$label = $this->pluralize($this->class2name($this->modelClass, true));

echo "<?php\n"; ?>

$this->pageTitle = Yii::t('app', 'Create');

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>') => array('index'),
	$this->pageTitle,
);

$this->renderPartial('_form', array('model'=>$model)); ?>
