<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/6/16
 * Time: 10:40 AM
 */
include ('../classes/transmitter.php');
date_default_timezone_set('America/New_York');

$transmitter = new Reporter();
$now = date('m-d-y');

if(!isset($_GET['act'])) {
    $output = array("Error"=>"No Action Set");
    echo json_encode($output);
    exit();
}
if(isset($_GET['date'])) {
    $now = $_GET['date'];
}

switch($_GET['act']) {
    case 'invite':
        if(isset($_GET['state'])) {
            echo $transmitter->stateInvites($_GET['state'], $now);
        } else {
            echo $transmitter->totalInvites($now);
        }
        break;
    case 'message':
        if(isset($_GET['state'])) {
            echo $transmitter->stateMessages($_GET['state'], $now);
        } else {
            echo $transmitter->totalMessages($now);
        }
        break;
    default:
        $output = array("Error"=>"Unknown Action");
        echo json_encode($output);
        exit();
}
exit();