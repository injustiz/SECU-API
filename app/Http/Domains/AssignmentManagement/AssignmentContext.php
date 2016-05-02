<?php namespace App\Http\Domains\AssignmentManagement;

use App\Assignment;
use App\Http\Domains\AssignmentManagement\AssignmentStateFactory;
use Illuminate\Support\Facades\DB;

class AssignmentContext extends Assignment
{
    private $currentState;
    
    function getState(){
        if(isset($this->currentState))
            return  $this->currentState->name;
        return null;
    }
    
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
        $isNullStatus = false;
        if(!isset($id->status)){
            $isNullStatus = true;
        }
        $assignmetState = AssignmentStateFactory::getAssignmentState($assignmentContext->status);
        $assignmentContext->setState($assignmetState);
        if($isNullStatus == true){
            $assignmentContext->updateStatus();
        }
        
        return $assignmentContext;
    }
    
    public static function create(array $attributes = []){
        $assignment = Assignment::create($attributes);
        $assignmentContext = self::get($assignment->assignment_id);
        
        return $assignmentContext;
    }
}