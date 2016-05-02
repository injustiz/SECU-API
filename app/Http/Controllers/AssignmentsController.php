<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Domains\AssignmentManagement\AssignmentStateInterface;
use App\Http\Domains\AssignmentManagement\AssignmentDraftState;
use App\Http\Domains\AssignmentManagement\AssignmentDomain;
use App\Http\Domains\AssignmentManagement\AssignmentContext;

class AssignmentsController extends Controller {

	const MODEL = "App\Assignment";

	const META_MODEL = "App\AssignmentMeta";
	const FIELD_METAKEY = "assignment_metakey";  // meta_key field name
	const FIELD_METAVALUE = "assignment_metavalue"; // meta_value field name

	use RESTMetaActions;
	
	/************************************************************
	 *     Addition Custom function for each controller kub     *
	 ************************************************************/
	 public function create(Request $request){

		
		$assignment = AssignmentDomain::create($request->all());
		 
		return $this->respond(Response::HTTP_OK, $assignment);
	 }
	 
	 public function changeState(Request $request){
		$this->validate($request, [
				'id' => 'required'
			]);
			
		 $assignment = AssignmentDomain::changeState($request->input("id"), $request->input("target"));
		 
		 return $this->respond(Response::HTTP_OK);
	 }
}
