<?php

namespace App\Http\Controllers;

use App\Diccionario_variable;
use Illuminate\Http\Request;

class Diccionaro_variablesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function categorias() {
		$categorias = \App\Categoria::all();
		$subcategorias = $categorias[0]->subcategorias;
		$variables = $subcategorias->variables;
		dd($variables);
	}

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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Diccionario_variable  $diccionario_variable
	 * @return \Illuminate\Http\Response
	 */
	public function show(Diccionario_variable $diccionario_variable) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Diccionario_variable  $diccionario_variable
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Diccionario_variable $diccionario_variable) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Diccionario_variable  $diccionario_variable
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Diccionario_variable $diccionario_variable) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Diccionario_variable  $diccionario_variable
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Diccionario_variable $diccionario_variable) {
		//
	}
}
