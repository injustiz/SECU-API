<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AssignmentStateOption;


class AssignmentDraftState implements AssignmentStateInterface
{
    private static $_instance;
    
    private function __construct(){
        
    }
    
    function getStateId(){
        return AssignmentStateOption::DRAFT_STATE;
    }
    
    public function goNext($context, $target){
        $context->setState(AssignmentPublicState::getInstance());
        $context->updateStatus();
    }
    
    public function canChangeState($context){
        
    }
    
    public function performAction($context){

    }
    
    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance = new AssignmentDraftState();
        }
        return self::$_instance;
    }
}