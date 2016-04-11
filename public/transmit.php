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

function outputInfo($output, $mode='json', $which='action') {
    if($mode == 'json') {
        echo json_encode($output);
    } else if($mode == 'fusion') {
        if(isset($output['Error'])) {
            echo "&value=0";
        } else {
            if($which == 'action') {
                echo "&value=" . ($output['Users'] ?: 0);
            } else if($which == 'invitees') {
                echo "&value=" . ($output['Invitees'] ?: 0);
            }
        }
    }
    return;
}

if(!isset($_GET['act'])) {
    $output = array("Error"=>"No Action Set");
    outputInfo($output);
    exit();
}
if(isset($_GET['date'])) {
    $now = $_GET['date'];
}
$outMode = 'json';
if(isset($_GET['mode'])) {
    if($_GET['mode'] == 'fusion') {
        $outMode = 'fusion';
    }
}

switch($_GET['act']) {
    case 'invite':

        if(isset($_GET['state'])) {
            outputInfo($transmitter->stateInvites($_GET['state'], $now), $outMode, (isset($_GET['which']) ? $_GET['which']: null));
        } else {
            outputInfo($transmitter->totalInvites($now), $outMode, (isset($_GET['which']) ? $_GET['which']: null));
        }
        break;
    case 'message':
        if(isset($_GET['state'])) {
            outputInfo($transmitter->stateMessages($_GET['state'], $now), $outMode);
        } else {
            outputInfo($transmitter->totalMessages($now), $outMode);
        }
        break;
    default:
        $output = array("Error"=>"Unknown Action");
        outputInfo($output, $outMode);
        exit();
}
exit();