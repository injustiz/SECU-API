<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Domains\AssignmentManagement\AttemptAssignmentDomain;

class AttemptAssignmentsController extends Controller {

	const MODEL = "App\AttemptAssignment";

	use RESTActions;
	
	/************************************************************
	 *     Addition Custom function for each controller kub     *
	 ************************************************************/
	 public function create(Request $request){

		
		$assignment = AttemptAssignmentDomain::create($request->all());
		 
		return $this->respond(Response::HTTP_OK, $assignment);
	 }
	 
	 public function changeState(Request $request){
		$this->validate($request, [
				'id' => 'required'
			]);
			
		 $assignment = AttemptAssignmentDomain::changeState($request->input("id"), $request->input("target"));
		 
		 return $this->respond(Response::HTTP_OK);
	 }
}
