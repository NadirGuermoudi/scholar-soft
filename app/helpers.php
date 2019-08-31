<?php

if(! function_exists('page_title')) {
	function page_title($title) {
		// $base_title = config('app.name') . ' - List of artisans';
		$base_title = config('app.name');

		if($title === '') {
			return $base_title;
		} else {
			return $title . ' | ' . $base_title;
		}
	}
}

if(! function_exists('set_active_route')) {
	function set_active_route($route) {
		return Route::is($route) ? 'active' : '';
	}
}

if(! function_exists('no_repeat')){
	function no_repeat($min,$max,$count) {

		if($max - $min < $count) {
			return false;
		}

		$nonrepeatarray = array();
		for($i = 0; $i < $count; $i++) {
			$rand = rand($min,$max);

			while(in_array($rand,$nonrepeatarray)) {
				$rand = rand($min,$max);
			}

			$nonrepeatarray[$i] = $rand;
		}
		return $nonrepeatarray;
	}
}