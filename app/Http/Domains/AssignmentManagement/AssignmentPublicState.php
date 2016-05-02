<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AssignmentStateOption;

class AssignmentPublicState implements AssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AssignmentStateOption::PUBLIC_STATE;
    }
    
    public function goNext($context, $target){
        $context->setState(AssignmentDraftState::getInstance());
        $context->updateStatus();
    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AssignmentPublicState();
        }
        return self::$_instance;
    }
}