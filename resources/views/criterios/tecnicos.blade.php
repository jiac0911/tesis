@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criterios Tecnicos</div>
                <div class="card-body">
                    <form method="POST" action="/tecnicos">
                    {{ csrf_field() }}
                        @for ($i = 0; $i < 5; $i++)
                            <div class="col-md-6 mb-3">
                                <label for="ult_tec">{{ $opciones[$i]->variable }}</label>
                                <select name="{{ $opciones[$i]->variable }}" class="form-control" required>
                                    @foreach ($opciones[$i] as $opcion)
                                        <option value="{{ $opcion->nivel }}">{{ $opcion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endfor
{{--

                        <div class="col-md-6 mb-3">
                            <label for="Años_sop">Años de Soporte Restantes</label>
                            <select name="años_soporte" class="form-control" required>
                              <option value="1">Menos De 5 Años</option>
                              <option value="2">Entre 2 y 5 años</option>
                              <option value="3">Menos De 2 Años</option>
                              <option value="4">Sin Soporte o Sin Informacion</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sop_rep">Soporte de Repuestos</label>
                            <select name="soporte_repuestos" class="form-control" required>
                              <option value="1">Soporte Local Con Repuestos Originales</option>
                              <option value="2">Otro Proveedor Con Repuestos Originales</option>
                              <option value="3">Se Pueden Obtener Genericos</option>
                              <option value="4">Sin Acceso a Repuestos</option>
                            </select>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="mediciones">Calibraciones y Mediciones</label>
                            <select name="mediciones" class="form-control" required>
                              <option value="1">Se le realiza calibración y/o mediciones y queda dentro de los rangos establecidos</option>
                              <option value="3">Se le realiza calibración y/o mediciones y queda fuera de los rangos establecidos</option>
                              <option value="4">Necesita Calibracion y/o Mediciones Pero no se Realizan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="mant_prev">Cantidad Mantenimientos Preventivos Anual</label>
                            <input type="text" class="form-control" id="cant_prev" placeholder="" name="cant_prev" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mant_prev">Cantidad Mantenimientos Preventivos Anuales Recomendados</label>
                            <input type="text" class="form-control" id="cant_prev_rec" placeholder="" name="cant_prev_rec" required>
                        </div>
                        <div>
                            <input name="equipo" type="text" value="{{ $equipo }}" style="opacity:0; position:absolute;">
                        </div>
 --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Guardar' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
