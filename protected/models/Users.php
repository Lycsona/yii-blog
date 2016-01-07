<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property integer $ip
 * @property string $created_add
 * @property string $city
 * @property integer $gender
 * @property string $birthday
 * @property string $avatar
 */
class Users extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('firstname, lastname, email, password, ip, gender', 'required'),
            array('ip, gender', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, email, birthday', 'length', 'max' => 20),
            array('password', 'length', 'max' => 100),
            array('city', 'length', 'max' => 15),
            array('avatar', 'file', 'types' => 'jpg, gif, png'),
            array('created_add', 'safe'),

            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, firstname, lastname, email, password, ip, created_add, city, gender, birthday, avatar', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
            'ip' => 'Ip',
            'created_add' => 'Created Add',
            'city' => 'City',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'avatar' => 'Avatar',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('ip', $this->ip);
        $criteria->compare('created_add', $this->created_add, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('avatar', $this->avatar, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
