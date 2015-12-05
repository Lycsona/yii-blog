<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php

$nameColumn = $this->guessNameColumn($this->tableSchema->columns);

?>
<div class="item">
	<h2><?php echo "<?php echo CHtml::link(\$data->{$nameColumn}, array('view', 'id' => \$data->{$this->tableSchema->primaryKey})); ?>"; ?></h2>
	<hr />
<?php foreach($this->tableSchema->columns as $name=>$column): ?>
	<?php echo "<?php echo \$data->getAttributeLabel('{$name}'); ?>:\n"; ?>
	<?php echo "<?php echo \$data->{$name}; ?><br />\n"; ?>
<?php endforeach; ?>
</div>
