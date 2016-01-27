<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Emotion Expression and their ratings
//poor => 1,satisfactory => 2, good => 3, excellent => 4
$config['EMOTICON_TYPES'] = array(1 => 'Poor', 2 => 'Satisfactory', 3 => 'Good', 4 => 'Excellent');

//languages
$config['LANGUAGES'] = array('multi' => 'Multilingual' ,'en' => 'English' ,'ta' => 'Tamil' ,'si' => 'Sinhala');

//Business Types
$config['BUSINESS_TYPES'] = array('hotel' => 'Hotel' ,'hospital' => 'Hospital' ,'travel' => 'Travel');

//User Types
$config['USER_TYPES'] = array('1' => 'Super Admin' ,'2' => 'Admin' ,'3' => 'Report User');