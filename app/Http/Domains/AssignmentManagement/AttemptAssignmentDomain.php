<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentContext;

class AttemptAssignmentDomain {
    
    public static function create($data){
        $attrmptAssignmentContext = AttemptAssignmentContext::create($data);
        return $attrmptAssignmentContext;
    }
    
    public static function changeState($id, $target){
        $attrmptAssignmentContext = AttemptAssignmentContext::get($id);
        $attrmptAssignmentContext->goNext($target);
    }
}