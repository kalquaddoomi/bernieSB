<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 3/25/16
 * Time: 11:55 AM
 */

require "../vendor/autoload.php";
require "../vendor/predis/predis/autoload.php";
date_default_timezone_set('America/New_York');

class Reporter {
    private $_pclient;
    protected $_single_server = array(
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 4
    );
    private $_events = array('Invite', 'Message');

    public function __construct($flush=false) {
        $this->_pclient = new \Predis\Client($this->_single_server, array('profile' => '2.8'));
        if($flush) {
            $this->_pclient->flushdb();
        }
    }

    public function totalsReport() {
        foreach($this->_events as $eventName) {
            $totals[$eventName] = $this->_pclient->get($eventName);
        }
    }

}