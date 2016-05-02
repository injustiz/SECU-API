<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AssignmentStateOption;
use App\Http\Domains\AssignmentManagement\AssignmentPublishedState;

class AssignmentPrivateState implements AssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AssignmentStateOption::PUBLISHED_STATE;
    }
    
    public function goNext($context, $target){
        $context->setState(AssignmentPublishedState::getInstance());
        $context->updateStatus();
    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AssignmentPrivateState();
        }
        return self::$_instance;
    }
}