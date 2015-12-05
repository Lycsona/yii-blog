<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className); ?> widget class.
 * @package application.widgets
 */
class <?php echo ucfirst($this->className); ?> extends <?php echo $this->baseClass."\n"; ?>
{
    const PACKAGE_ID = '<?php echo $this->className; ?>';
    const <?php echo strtoupper($this->className); ?>_CSS_CLASS = '<?php echo $this->className; ?>';
    
    /**
     * @var string <?php echo ucfirst($this->className); ?> version
     */
    public $version = '1.0.0';
    
    /**
     * @var array
     */
    private $package = array();
    
    /**
     * @var string
     */
    public $tagName = 'div';

    /**
     * @var array
     */
    public $htmlOptions = array();
    
	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
        
        if (!empty($this->htmlOptions['class'])) {
            $classes = explode(' ', $this->htmlOptions['class']);
            if (!in_array(self::<?php echo strtoupper($this->className); ?>_CSS_CLASS, $classes)) {
                $this->htmlOptions['class'] .= ' ' . self::<?php echo strtoupper($this->className); ?>_CSS_CLASS;
            }
        } else {
            $this->htmlOptions['class'] = self::<?php echo strtoupper($this->className); ?>_CSS_CLASS;
        }
        
        $this->registerClientScript();
        echo CHtml::openTag($this->tagName, $this->htmlOptions);
	}

	/**
	 * Executes the widget.
	 */
	public function run()
	{
        parent::run();

        echo CHtml::closeTag($this->tagName);
	}
    
    
    protected function registerClientScript()
    {
        //$path = Yii::app()->assetManager->publish(
        //    Yii::getPathOfAlias('application.widgets.<?php echo strtolower($this->className); ?>.assets')
        //);
    
        $this->package = array(
            //'baseUrl' => $path,
            'baseUrl' => '/js/<?php echo strtolower($this->className); ?>/',
            'css' => array('<?php echo strtolower($this->className); ?>.css'),
            'js' => array('<?php echo strtolower($this->className); ?>.js'),
            'depends' => array('jquery'),
        );

        Yii::app()->getClientScript()->addPackage(self::PACKAGE_ID, $this->package);
        Yii::app()->getClientScript()->registerPackage(self::PACKAGE_ID);
    }
}