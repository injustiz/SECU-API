<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AtemptAssignmentStateOption;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentGradingState;

class AttemptAssignmentCompleteState implements AttemptAssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AttemptAssignmentStateOption::COMPLETE_STATE;
    }
    
    public function goNext($context, $target){
        $context->setState(AttemptAssignmentGradingState::getInstance());
        $context->updateStatus();
    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AttemptAssignmentCompleteState();
        }
        return self::$_instance;
    }
}