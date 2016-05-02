<?php namespace App\Http\Domains\AssignmentManagement;

use App\AttemptAssignment;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateFactory;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentStateOption;
use Illuminate\Support\Facades\DB;

class AttemptAssignmentContext extends AttemptAssignment
{
    private $currentState;
    
    function goNext($target){
        if(isset( $this->currentState)){
            $this->currentState->goNext($this, $target);
        }
    }
    
    function updateStatus(){
        $stateId = $this->currentState->getStateId();
         DB::table($this->table)
            ->where($this->primaryKey, $this->attempt_assignment_id)
            ->update(['status' => $stateId]);
         $this->status = $stateId;   
    }
    
    function setState($state){
         $this->currentState = $state;
    }
    
    public static function get($id){
        $attemptAssignmentContext = parent::find($id);
        $attemptAssignmentState = AttemptAssignmentStateFactory::getAttemptAssignmentState($attemptAssignmentContext->status);
        $attemptAssignmentContext->setState($attemptAssignmentState);
        return $attemptAssignmentContext;
    }
    
    public static function create(array $attributes = []){
        if(!array_key_exists("status", $attributes)){
            $attributes["status"] = AttemptAssignmentStateOption::INCOMPLETE_STATE;
        }
        $attemptAssignment = AttemptAssignment::create($attributes);
        $attemptAssignmentContext = self::get($attemptAssignment->attempt_assignment_id);
        
        return $attemptAssignmentContext;
    }
}