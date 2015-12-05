<?php

// This is the database connection configuration.
return array(

    'class' => 'CDbConnection',
    'connectionString' => 'mysql:host=localhost;dbname=blog',
    'enableParamLogging' => true,
    'emulatePrepare' => true,
    'enableProfiling' => true,
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'schemaCachingDuration' => 600,
    'tablePrefix' => 'tbl_'
);
