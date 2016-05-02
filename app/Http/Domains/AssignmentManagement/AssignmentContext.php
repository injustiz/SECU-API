<?php namespace App\Http\Domains\AssignmentManagement;

use App\Assignment;
use App\Http\Domains\AssignmentManagement\AssignmentStateFactory;
use App\Http\Domains\AssignmentManagement\AssignmentStateOption;
use Illuminate\Support\Facades\DB;

class AssignmentContext extends Assignment
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
            ->where($this->primaryKey, $this->assignment_id)
            ->update(['status' => $stateId]);
         $this->status = $stateId;   
    }
    
    function setState($state){
         $this->currentState = $state;
    }
    
    public static function get($id){
        $assignmentContext = parent::find($id);
        $assignmetState = AssignmentStateFactory::getAssignmentState($assignmentContext->status);
        $assignmentContext->setState($assignmetState);
        return $assignmentContext;
    }
    
    public static function create(array $attributes = []){
        if(!array_key_exists("status", $attributes)){
            $attributes["status"] = AssignmentStateOption::DRAFT_STATE;
        }
        $assignment = Assignment::create($attributes);
        $assignmentContext = self::get($assignment->assignment_id);
        
        return $assignmentContext;
    }
}