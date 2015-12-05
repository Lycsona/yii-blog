<?php
/**
 * @package gii
 */
class BehaviorCode extends CCodeModel
{
    public $className;
    public $baseClass='CBehavior';
    public $scriptPath='application.behaviors';

    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('className,baseClass,scriptPath', 'required'),
            array('className', 'match', 'pattern'=>'/^\w+$/'),
			array('baseClass', 'match', 'pattern'=>'/^\w+$/', 'message'=>'{attribute} should only contain word characters.'),
			array('baseClass', 'sticky'),
            array('scriptPath', 'validateScriptPath'),
            array('scriptPath', 'sticky'),
        ));
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'baseClass'=>'Base Class',
            'className'=>'Behavior Class Name',
            'scriptPath'=>'Script Path',
        ));
    }
	public function validateScriptPath($attribute,$params)
	{
		if($this->hasErrors('scriptPath'))
			return;
		if(Yii::getPathOfAlias($this->scriptPath)===false)
			$this->addError('scriptPath','Script Path must be a valid path alias.');
	}

    public function prepare()
    {
        $path=Yii::getPathOfAlias($this->scriptPath).'/' . $this->buildClassName() . '.php';
        $code=$this->render($this->templatepath.'/subtemplates.php');
        $this->files[]=new CCodeFile($path, $code);
    }

    public function printSubTemplate($className=null)
    {
        $path=$this->templatepath.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR;
        $code = ($className)
            ? $path . strtolower($className). '.php'
            : $path . strtolower($this->baseClass). '.php';
        ob_start();
        if (file_exists($code)){
            include $code;
        } else {
            include $path.'dummy.php';
        }
        $out = ob_get_contents();
        ob_end_clean();
        echo $out;
    }

    public function buildClassName (){
        switch(strtolower($this->baseClass)){
            case "cbehavior": $praefix = 'Behavior';break;
            case "cmodelbehavior": $praefix = 'ModelBehavior';break;
            case "cactiverecordbehavior": $praefix = 'ActiveRecordBehavior';break;
            default: $praefix = $this->baseClass;
        }
        return ucfirst($this->className) . $praefix;
    }


}
