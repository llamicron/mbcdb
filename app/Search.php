<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function __construct() {

    }

		public static function byClass($class, $term, $fields=['name']) {
			if ($class == 'App\Counselor') {
				$fields = Counselor::getFields();
			}


			foreach ($fields as $field) {
				$results = $class::where($field, 'LIKE', "%{$term}%")->paginate(1);
				if (!$results->isEmpty()) {
					return view('counselors.results', compact('results'));
				}
			}
			return redirect('/noResults');
		}



}
