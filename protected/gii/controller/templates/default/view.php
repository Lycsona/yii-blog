<?php
/**
 * This is the template for generating an action view file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 * - $action: the action ID
 */
?>
<?php
echo "<?php\n\n";

$label = ucwords(trim(strtolower(str_replace(array('-','_','.'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', basename($this->getControllerID()))))));

if($action === 'index')
{
?>
$this->pageTitle = Yii::t('app', '<?php echo $label; ?>');

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>'),
);

<?php
}
else
{
	$action = ucfirst($action);
?>
$this->pageTitle = Yii::t('app', '<?php echo $label; ?>');

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>') => array('index'),
	Yii::t('app', '<?php echo $action; ?>'),
);

<?php
}
?>
?><div class="page-header">
	<h1><?php echo '<?php'; ?> echo Yii::t('app', '<?php echo $label; ?>'); ?></h1>
</div>
<div class="page-content">

	...

 	<div class="clearfix"></div>
</div>