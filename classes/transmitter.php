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
    private $_now;

    public function __construct($flush=false) {
        $this->_pclient = new \Predis\Client($this->_single_server, array('profile' => '2.8'));
        if($flush) {
            $this->_pclient->flushdb();
        }
        $this->_now = date('m-d-y');
    }

    public function stateInvites($stateName, $date = null) {
        if(is_null($date)) {
            $date = $this->_now;
        }
        $invitations = $this->_pclient->get($stateName.":Invite:".$date);
        $actionInvites = $this->_pclient->get($stateName.":Invite:actions:".$date);
        $output = array("State"=>$stateName, "Date"=>$date, "Invitees"=>$invitations, "Users"=>$actionInvites);
        return $output;
    }

    public function stateMessages($stateName, $date = null) {
        if(is_null($date)) {
            $date = $this->_now;
        }
        $messages = $this->_pclient->get($stateName.":Message:".$date);
        $actionMessages = $this->_pclient->get($stateName.":Message:actions:".$date);
        $output = array("State"=>$stateName, "Date"=>$date, "Invitees"=>$messages, "Users"=>$actionMessages);
        return $output;
    }

    public function totalInvites($date = null) {
        if(is_null($date)) {
            $date = $this->_now;
        }
        $invites = $this->_pclient->get("Invite:".$date);
        $actionInvites = $this->_pclient->get("Invite:actions:".$date);
        $output = array("Date"=>$date, "Invitees"=>$invites, "Users"=>$actionInvites);
        return $output;
    }

    public function totalMessages($date = null) {
        if(is_null($date)) {
            $date = $this->_now;
        }
        $messages = $this->_pclient->get("Message:".$date);
        $actionMessages = $this->_pclient->get("Message:actions:".$date);
        $output = array("Date"=>$date, "Invitees"=>$messages, "Users"=>$actionMessages);
        return $output;
    }

}