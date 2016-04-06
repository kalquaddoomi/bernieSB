<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 3/24/16
 * Time: 4:11 PM
 */

require "../vendor/autoload.php";
require "../vendor/predis/predis/autoload.php";
date_default_timezone_set('America/New_York');

$single_server = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 4
);

if(isset($_GET['fbactor']) && isset($_GET['fbact'])) {
    $pClient = new Predis\Client($single_server, array('profile' => '2.8'));
    $now = date('m-d-y');
    $rHKey = $_GET['fbactor'];
    $rHField = $_GET['fbact'];
    $pClient->hincrby($rHKey, $rHField, 1);
    if(isset($_GET['fbhits'])) {
        $rHits = $_GET['fbhits'];
        $pClient->incrby($rHField . ":" . $now, $rHits);
    } else {
        $pClient->incr($rHField . ":" . $now);
    }
    $pClient->incr($rHField . ":actions:" . $now);

    if(isset($_GET['fbinv'])) {
        if(isset($_GET['pvtid']))
            $pClient->hset($_GET['fbinv'], 'pvt', $_GET['pvtid']);
        else if(isset($_GET['dmts'])) {
            $pClient->hset($_GET['fbinv'], 'dmts', $_GET['dmts']);
        } else if(isset($_GET['pubid'])) {
            $pClient->hset($_GET['fbinv'], 'pub', $_GET['pubid']);
        }
    }
    if(isset($_GET['fbst'])) {
        $rStHKey = $_GET['fbst'];
        $rStHField = $_GET['fbact'];
        $pClient->hincrby($_GET['fbst'].":".$now, $_GET['fbact'], 1);
        if(isset($_GET['fbhits'])) {
            $rStHits = $_GET['fbhits'];
            $pClient->incrby($rStHKey . ":" . $rStHField . ":" . $now, $rStHits);
        } else {
            $pClient->incr($rStHKey . ":" . $rStHField . ":" . $now);
        }
        $pClient->incr($rStHKey . ":" . $rStHField . ":actions:" . $now);
    }
}