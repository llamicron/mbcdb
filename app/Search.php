<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{

    public function __construct()
		{

    }

		public static function byClass($class, $term, $fields=['name']) {

			if (!isset($results)) {
				$results = new \Illuminate\Database\Eloquent\Collection;
			}

			foreach ($fields as $field) {
		  	$results->add($class::where($field, 'LIKE', "%{$term}%")->paginate(25));
			}
			return $results;
		}

}
