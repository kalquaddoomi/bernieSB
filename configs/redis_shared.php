<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 3/24/16
 * Time: 9:58 PM
 */

$single_server = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 15
);

$multiple_servers = array(
    array(
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 15,
        'alias'    => 'first',
    ),
    array(
        'host'     => '127.0.0.1',
        'port'     => 6380,
        'database' => 15,
        'alias'    => 'second',
    ),
);
