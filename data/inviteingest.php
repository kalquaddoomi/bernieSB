<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/13/16
 * Time: 11:15 AM
 */
$eventId = "214899885533267";

$eventIds = array(
    "NY"=>811998435572003,
    "NJ"=>229216130762869,
    "MD"=>1032906533414147,
    "PA"=>1721567841460557,
    "KY"=>521701654668687,
    "PR"=>496254420561306,
    "WV"=>1582995155349064,
    "CT"=>574021212779237,
    "OR"=>605367332973455,
    "RI"=>1776422845918803,
    "DE"=>214899885533267,
    "IN"=>133011150427768,
    "CA"=>1558296317802512,
    "GM"=>1703259566578785
);
require_once '../vendor/autoload.php';

require "../vendor/predis/predis/autoload.php";
date_default_timezone_set('America/New_York');

$single_server = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 4
);
$pClient = new Predis\Client($single_server, array('profile' => '2.8'));

$fb = new Facebook\Facebook([
    'app_id' => '1581448135500343',
    'app_secret' => 'f611e1c29ba537590f9b9df4f59e4407',
    'default_graph_version' => 'v2.5',
]);

function curl_post($url, array $post = NULL, array $options = array())
{
    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_POSTFIELDS => http_build_query($post)
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

function curl_get($url, array $get = NULL, array $options = array())
{
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

$accessKey = "CAAWeUZAZAY4jcBAGGtKW0pdjBdZCZCfMFrpJcgZAnZBZB66IWcGtVkQMxoaRWS32mGk3PLcCyJEKRvtpVlU7lacuaXRYNPZB7ZCEhdbGOvMq7N5QN1NQi1K0jjqxS6vFkLddkHQCvS3qOKZB8t5FyjyZA9kL4ZAOdfxnQDmIVB4q6xPmPh0b5jvQ4ULTj0yVNGD6BhAZD";

$inviteesRaw = curl_get("https://graph.facebook.com/v2.6/$eventId/noreply", array('access_token'=>$accessKey, 'limit'=>"1000", "after"=>""));
$invitees = json_decode($inviteesRaw, true);

foreach($eventIds as $st=>$eventId) {
    echo "\nProcessing $st :\n";
    $inviteesRaw = curl_get("https://graph.facebook.com/v2.6/$eventId/noreply", array('access_token' => $accessKey, 'limit' => "1000", "after" => ""));
    $invitees = json_decode($inviteesRaw, true);

    foreach ($invitees['data'] as $fbInvitee) {
        $pClient->hsetnx("private:" . $eventId, $fbInvitee['id'], $fbInvitee['rsvp_status']);
    }
    $counter = 1000;
    while (isset($invitees['paging']['next'])) {
        $after = $invitees['paging']['cursors']['after'];
        $inviteesRaw = curl_get("https://graph.facebook.com/v2.6/$eventId/noreply", array('access_token' => $accessKey, 'limit' => "1000", "after" => $after));
        $invitees = json_decode($inviteesRaw, true);
        foreach ($invitees['data'] as $fbInvitee) {
            $pClient->hsetnx("private:" . $st . ":". $eventId, $fbInvitee['id'], $fbInvitee['rsvp_status']);
        }
        $counter += 1000;
        echo "Processed: $counter : $after        \r";
    }
}
echo "\nDone\n";
exit();