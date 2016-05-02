<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentDraftState;
use App\Http\Domains\AssignmentManagement\AssignmentPublicState;

use App\Http\Domains\AssignmentManagement\AssignmentStateOption;

class AssignmentStateFactory
{
    public static function getAssignmentState($stateId){
        switch ($stateId) {
            case AssignmentStateOption::PUBLIC_STATE:
                return AssignmentPublicState::getInstance();
                break;
            default:
                return AssignmentDraftState::getInstance();
                break;
        }
    }
}