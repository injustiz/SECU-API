<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AssignmentStateOption;

class AssignmentClosedState implements AssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AssignmentStateOption::CLOSED_STATE;
    }
    
    public function goNext($context, $target){

    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AssignmentClosedState();
        }
        return self::$_instance;
    }
}