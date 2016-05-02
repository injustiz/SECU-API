<?php namespace App\Http\Domains\AssignmentManagement;

interface AttemptAssignmentStateInterface
{
    public function getStateId();
    
    public function goNext($context, $target);
    
    public static function getInstance();
    
    public function canChangeState($context);
    public function performAction($context);
}