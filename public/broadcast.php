<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/7/16
 * Time: 9:05 AM
 */
include ('../classes/transmitter.php');
date_default_timezone_set('America/New_York');

$transmitter = new Reporter();
$now = date('m-d-y');

$currentStates = array(
    "wyoming",
    "newyork",
      
);