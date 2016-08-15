<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{

    public function __construct()
		{

    }

		public static function byClass($class, $term, $fields=['name']) {

			if ($class == 'App\Counselor') {
				$fields = Counselor::getFields();
			}

			if (!isset($results)) {
				$results = new \Illuminate\Database\Eloquent\Collection;
			}

			foreach ($fields as $field) {
		  	$results->add($class::where($field, 'LIKE', "%{$term}%")->get());
			}
			return $results;
		}

}
