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
		return view('criterios/info');
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
			'edad' => 'required',
			'vida_util' => 'required',
			'costo_adquisicion' => 'required',
			'costo_nuevo' => 'required',
			'costo_mantenimiento' => 'required',
			'tiempo_parado' => 'required',
			'tiempo_operacion' => 'required',
			'nro_reparaciones' => 'required',
			'años_reparaciones' => 'required',

		]);
		//dd($request);
		//$form = request()->all();
		//dd($form);
		$equipo = new Equipo($form);
		$equipo->hospital_id = auth()->user()->hospital->id;
		//dd($equipo);
		$equipo->save();
		//dd($equipo->id);
		return redirect('/');
	}
	public function showEquipos() {
		$hospital = auth()->user()->hospital;
		$equipos = $hospital->equipos;
		##dd($equipos);
		return view('criterios/creados')->with('equipos', $equipos);

	}

	public function createTecnicos(Equipo $equipo) {
		//dd($equipo);
		$variables = \App\Diccionario_variable::categorias(0);
		//dd($variables);
		//$variables['equipo'] = $equipo->id;
		unset($variables[3]);
		unset($variables[4]);
		unset($variables[6]);
		$opciones = array();
		foreach ($variables as $variable) {
			//dd($variables);
			$opc = $variable['variable']->diccionario_variables;
			$opc->variable = $variable['variable']['nombre'];
			array_push($opciones, $opc);
		}
		// $x = $variables[14]['variable'];
		// $y = $x->diccionario_variables;
		// dd($y);
		array_push($opciones, $equipo->id);
		//array_pop($opciones);
		// dd($opciones);
		return view('criterios/tecnicos')->with('opciones', $opciones);
	}

	public function storeTecnicos(Request $request) {
		$form = request()->all();
		dd($form);
		//dd($form);
		//dd(auth()->user()->hospital->id);
		$this->validate(request(), [

			'estado_de_tecnologia' => 'required', #
			'Soporte_Tecnico_(años_restantes)' => 'required', #
			'suministro_de_repuestos' => 'required', #
			'mediciones' => 'required', #
			'mantenimientos_preventivos_(anual)' => 'required', #

		]);
///////////hasta aca
		$eficiencia = ($form['tiempo_operacion'] - $form['tiempo_parado']) * 100 / $form['tiempo_operacion'];
		$tasa_falla = $form['nro_reparaciones'] / $form['años_reparaciones'];
		//dd($request);
		//$form = request()->all();
		//dd($form);

		$equipo = Equipo::find($form['equipo']);
		$vida = $equipo['edad'] * 100 / $equipo['vida_util'];

		if ($form['cant_prev'] > $form['cant_prev_rec']) {
			$mant_prev = 1;
		} elseif ($form['cant_prev'] = $form['cant_prev_rec']) {
			$mant_prev = 2;
		} elseif ($form['cant_prev'] < $form['cant_prev_rec']) {
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

		$equipo->variable()->sync([
			14 => ['valor' => $form['estado_tecnologia']],
			21 => ['valor' => $form['años_soporte']],
			15 => ['valor' => $form['soporte_repuestos']],
			3 => ['valor' => $vida],
			4 => ['valor' => $eficiencia],
			6 => ['valor' => $tasa_falla],
			17 => ['valor' => $form['mediciones']],
			8 => ['valor' => $mant_prev],
		]
		);

		return view('criterios/clinicos')->with('equipo', $equipo->id);
	}

	public function storeClinicos(Request $request) {
		$form = request()->all();
		//dd($form);
		//dd(auth()->user()->hospital->id);
		$this->validate(request(), [
			'aceptabilidad' => 'required', #
			'funcion_clinica' => 'required', #
			'contribucion_servicio' => 'required',
			'riesgo' => 'required',
		]);

		//dd($request);
		//$form = request()->all();
		//dd($form);

		$equipo = Equipo::find($form['equipo']);
		//dd($equipo['costo_adquisicion']);
		$cm_ca = $equipo['costo_mantenimiento'] * 100 / $equipo['costo_adquisicion'];
		$cm_cc = $equipo['costo_mantenimiento'] * 100 / $equipo['costo_nuevo'];

		if ($cm_ca <= 1.75) {
			$cm_ca = 1;
		} elseif ($cm_ca > 1.75 && $cm_ca <= 3.4) {
			$cm_ca = 2;
		} elseif ($cm_ca > 3.4 && $cm_ca <= 5) {
			$cm_ca = 3;
		} else {
			$cm_ca = 4;
		}

		if ($cm_cc > 0 && $cm_cc < 5) {
			$cm_cc = 1;
		} elseif ($cm_cc >= 5 && $cm_cc <= 15) {
			$cm_cc = 2;
		} elseif ($cm_cc >= 15 && $cm_cc < 25) {
			$cm_cc = 3;
		} else {
			$cm_cc = 4;
		}
		$equipo->variable()->attach([
			18 => ['valor' => $form['aceptabilidad']],
			19 => ['valor' => $form['funcion_clinica']],
			20 => ['valor' => $form['contribucion_servicio']],
			16 => ['valor' => $form['riesgo']],
			10 => ['valor' => $cm_cc],
			9 => ['valor' => $cm_ca],
		]
		);
		return $this->calcularScore($equipo);
	}

	public function calcularScore(Equipo $equipo) {
		dd($equipo->variable);
		$equipo->variable;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Equipo  $equipo
	 * @return \Illuminate\Http\Response
	 */

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
