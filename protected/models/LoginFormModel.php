<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginFormModel extends CFormModel
{
    public $email;
    public $password;
    public $rememberMe;


    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('email, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),

        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'rememberMe' => 'Remember me next time',
        );
    }


    public function login($model)
    {
        $email = $model->email;
        $pass = $model->password;
        $user = Users::model()->findAll("email =  '$email' and password = '$pass'");
        if (!empty($user)) {
            return true;
        } else {
            echo 'error';
        }
    }
}
