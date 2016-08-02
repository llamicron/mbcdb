<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function __construct() {

    }

		public static function byClass($class, $term, $fields=['name']) {
			if ($class == 'App\Counselor') {
				$fields = [
					'last_name',
					'name',
					'unit_num',
		      'first_name',
					'address',
					'city',
		      'state',
		      'zip',
		      'email',
		      'primary_phone',
		      'secondary_phone',
		      'bsa_id',
		    ];
			}


			foreach ($fields as $field) {
				$results = $class::where($field, 'LIKE', "%{$term}%")->get();
				if (!$results->isEmpty()) {
					return view('counselors.results', compact('results'));
				}
			}
			return redirect('/noResults');
		}



}
