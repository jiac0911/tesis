<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {
	protected $fillable = [
		'nombre', 'marca', 'serie', 'ubicacion', 'codigo', 'edad', 'vida_util', 'costo_adquisicion', 'costo_nuevo', 'costo_mantenimiento', 'hospital_id',
	];
	public function hospital() {
		return $this
			->belongsTo('App\Hospital');
	}

	public function variable() {
		return $this
			->belongsToMany('App\Variable');
	}
}
