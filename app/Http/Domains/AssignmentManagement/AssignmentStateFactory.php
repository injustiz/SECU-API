<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AssignmentDraftState;
use App\Http\Domains\AssignmentManagement\AssignmentPrivateState;
use App\Http\Domains\AssignmentManagement\AssignmentPublishedState;
use App\Http\Domains\AssignmentManagement\AssignmentClosedState;

use App\Http\Domains\AssignmentManagement\AssignmentStateOption;

class AssignmentStateFactory
{
    public static function getAssignmentState($stateId){
        switch ($stateId) {
            case AssignmentStateOption::PRIVATE_STATE:
                return AssignmentPrivateState::getInstance();
                break;
            case AssignmentStateOption::PUBLISHED_STATE:
                return AssignmentPublishedState::getInstance();
                break;
            case AssignmentStateOption::CLOSED_STATE:
                return AssignmentClosedState::getInstance();
                break; 
            default:
                return AssignmentDraftState::getInstance();
                break;
        }
    }
}