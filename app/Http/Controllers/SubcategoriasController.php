<?php

namespace App\Http\Controllers;

use App\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$subcategorias = Subcategoria::orderBy('id', 'DESC')->get();
		return view('subcategoria.index', compact('subcategorias'));
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
	 * @param  \App\Subcategoria  $subcategoria
	 * @return \Illuminate\Http\Response
	 */
	public function show(Subcategoria $subcategoria) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Subcategoria  $subcategoria
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$subcategoria = Subcategoria::find($id);
		//dd($categoria);
		return view('subcategoria.edit', compact('subcategoria'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Subcategoria  $subcategoria
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, ['nombre' => 'required', 'peso' => 'required']);
		Subcategoria::find($id)->update($request->all());
		return redirect()->route('subcategoria.index')->with('success', 'Registro actualizado satisfactoriamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Subcategoria  $subcategoria
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Subcategoria $subcategoria) {
		//
	}
}
