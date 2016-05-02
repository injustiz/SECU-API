<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AtemptAssignmentStateOption;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentFinishState;

class AttemptAssignmentGradingState implements AttemptAssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AttemptAssignmentStateOption::GRADING_STATE;
    }
    
    public function goNext($context, $target){
        $context->setState(AttemptAssignmentFinishState::getInstance());
        $context->updateStatus();
    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AttemptAssignmentGradingState();
        }
        return self::$_instance;
    }
}