<?php

namespace App\Http\Controllers;
use App\Equipo;
use Illuminate\Http\Request;

class EquiposController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$form = request()->all();
		//dd($form);
		//dd(auth()->user()->hospital->id);
		$this->validate(request(), [

			'nombre' => 'required',
			'marca' => 'required',
			'edad' => 'required',
			'vida_util' => 'required',
			'costo_adquisicion' => 'required',
			'costo_nuevo' => 'required',
			'costo_mantenimiento' => 'required',

		]);
		//dd($request);
		//$form = request()->all();
		//dd($form);
		$equipo = new Equipo($form);
		$equipo->hospital_id = auth()->user()->hospital->id;
		//dd($equipo);
		$equipo->save();
		//dd($equipo->id);
		return view('tecnicos')->with('equipo', $equipo->id);
	}

	public function storeTecnicos(Request $request) {
		$form = request()->all();
		dd($form);
		//dd(auth()->user()->hospital->id);
		$this->validate(request(), [

			'estado_tecnologia' => 'required', #
			'años_soporte' => 'required', #
			'soporte_repuestos' => 'required', #
			'tiempo_parado' => 'required', #
			'tiempo_operacion' => 'required', #
			'nro_reparaciones' => 'required', #
			'años_reparaciones' => 'required', #
			'mediciones' => 'required',#
			'cant_prev' => 'required',#
			'cant_prev_rec' => 'required',#

		]);

		$eficiencia = ($form['tiempo_operacion'] - $form['tiempo_parado']) * 100 / $form['tiempo_operacion'];
		$tasa_falla = $form['nro_reparaciones'] / $form['años_reparaciones'];
		//dd($request);
		//$form = request()->all();
		//dd($form);

		$equipo = Equipo::find($form['equipo']);
		$vida = $equipo['edad'] * 100 / $equipo['vida_util'];


		if ($form['cant_prev'] > $form['cant_prev_rec']) {
			$mant_prev = 1;
		} elseif ($form['cant_prev'] = $form['cant_prev_rec'])) {
			$mant_prev = 2;
		} elseif ($form['cant_prev'] < $form['cant_prev_rec'])) {
			$mant_prev = 3;
		} else {
			$mant_prev = 4;
		}



		if ($vida = 0) {
			$vida = 0;
		} elseif ($vida > 0 && $vida < 0.6) {
			$vida = 1;
		} elseif ($vida >= 0.6 && $vida < 1) {
			$vida = 2;
		} elseif ($vida = 1) {
			$vida = 3;
		} else {
			$vida = 4;
		}

		if ($eficiencia >= 90) {
			$eficiencia = 1;
		} elseif ($eficiencia >= 70 && $eficiencia < 90) {
			$eficiencia = 2;
		} elseif ($eficiencia >= 50 && $eficiencia < 70) {
			$eficiencia = 3;
		} else {
			$eficiencia = 4;
		}

		if ($tasa_falla = 0) {
			$tasa_falla = 0;
		} elseif ($tasa_falla > 0 && $tasa_falla <= 1) {
			$tasa_falla = 1;
		} elseif ($tasa_falla > 1 && $tasa_falla <= 1.5) {
			$tasa_falla = 2;
		} elseif ($tasa_falla > 1.5 && $tasa_falla >= 2) {
			$tasa_falla = 3;
		} else {
			$tasa_falla = 4;
		}

		$equipo->variable()->sync([
			14 => ['valor' => $form['estado_tecnologia']],
			21 => ['valor' => $form['años_soporte']],
			15 => ['valor' => $form['soporte_repuestos']],

			3 => ['valor' => $vida],
			4 => ['valor' => $eficiencia],
			6 => ['valor' => $form['nro_reparaciones']],
			6 => ['valor' => $tasa_falla],
			17 => ['valor' => $form['mediciones']],
			8 => ['valor' => $mant_prev],
		]
		);

		return redirect('/tecnicos')->with('message', 'Se creo el equipo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Equipo  $equipo
	 * @return \Illuminate\Http\Response
	 */
	public function show(Equipo $equipo) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Equipo  $equipo
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Equipo $equipo) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Equipo  $equipo
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Equipo $equipo) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Equipo  $equipo
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Equipo $equipo) {
		//
	}

	public function tecnicos() {
		return view('tecnicos');
	}
}
