<?php namespace App\Http\Domains\AssignmentManagement;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentIncompleteState;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentCompleteState;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentGradingState;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentFinishState;

use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateOption;

class AttemptAssignmentStateFactory
{
    public static function getAttemptAssignmentState($stateId){
        switch ($stateId) {
            case AttemptAssignmentStateOption::COMPLETE_STATE:
                return AttemptAssignmentCompleteState::getInstance();
                break;
            case AttemptAssignmentStateOption::GRADING_STATE:
                return AttemptAssignmentGradingState::getInstance();
                break;
            case AttemptAssignmentStateOption::FINISH_STATE:
                return AttemptAssignmentFinishState::getInstance();
                break; 
            default:
                return AttemptAssignmentIncompleteState::getInstance();
                break;
        }
    }
}