<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model {

	public function equipo() {
		return $this
			->belongsToMany('App\Equipo');
	}
}
