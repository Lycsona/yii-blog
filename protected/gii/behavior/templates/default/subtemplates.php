<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->buildClassName(); ?> behavior class.
 * @package application.behaviors
 */
class <?php echo $this->buildClassName(); ?> extends <?php echo $this->baseClass."\n"; ?>
{
<?php $this->printSubTemplate(); ?>
}