<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AttemptAssignment extends Model {

	protected $table = 'attempt_assignment';

	protected $primaryKey = "attempt_assignment_id";

	protected $fillable = ["assignment_id", "status"];

	public static $rules = [
		// Validation rules
	];
}
