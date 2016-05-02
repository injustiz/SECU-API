<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AtemptAssignmentStateOption;

class AttemptAssignmentFinishState implements AttemptAssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AttemptAssignmentStateOption::FINISH_STATE;
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
            self::$_instance = new AttemptAssignmentFinishState();
        }
        return self::$_instance;
    }
}