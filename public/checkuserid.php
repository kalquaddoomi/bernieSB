<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/14/16
 * Time: 1:50 PM
 */

require "../vendor/autoload.php";
require "../vendor/predis/predis/autoload.php";

$single_server = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 4
);
$pClient = new Predis\Client($single_server, array('profile' => '2.8'));

if(isset($_GET['eid']) && is_numeric($_GET['eid'])) {
    if(isset($_GET['uid']) && is_numeric($_GET['uid'])) {

        $lookup = $pClient->hget('private:v2:'.$_GET['eid'], $_GET['uid']);
        $olookup = $pClient->hget('private:'.$_GET['eid'], $_GET['uid']);

        if($lookup == null && $olookup == null){
            header( 'Content-type:image/png' );
            fpassthru( fopen( 'dist/info/no.png', 'rb'));
        } else {
            print "Fail, Fail, Fail";
        }
    }
}