<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Emotion Expression and their ratings
//poor => 1,satisfactory => 2, good => 3, excellent => 4
$config['EMOTICON_TYPES'] = array(1 => 'Poor', 2 => 'Satisfactory', 3 => 'Good', 4 => 'Excellent');

//Business Types
$config['BUSINESS_TYPES'] = array('consumer' => 'Consumer' ,'healthcare' => 'Healthcare' ,'leisure' => 'Leisure','transportation' => 'Transportation','other' => 'Other');