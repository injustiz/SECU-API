<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentStateOption;

use App\Http\Domains\AssignmentManagement\AssignmentContext;

class AssignmentDomain {
    
    public static function create($data){
        $assignmentContext = AssignmentContext::create($data);
        return $assignmentContext;
    }
    
    public static function changeState($id, $target){
        $assignmentContext = AssignmentContext::get($id);
        $assignmentContext->goNext($target);
    }
}