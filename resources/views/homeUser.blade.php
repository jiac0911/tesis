@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion del equipo</div>
                <div class="card-body">
                    <form method="POST" action="/equipo">
                    {{ csrf_field() }}
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre del equipo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Marca</label>
                            <input type="text" class="form-control" id="marca" placeholder="" name="marca" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Serie</label>
                            <input type="text" class="form-control" id="serie" placeholder="" name="serie" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Ubicacion</label>
                            <input type="text" class="form-control" id="ubicacion" placeholder="" name="ubicacion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Codigo</label>
                            <input type="text" class="form-control" id="codigo" placeholder="" name="codigo" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Edad</label>
                            <input type="text" class="form-control" id="edad" placeholder="" name="edad" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Vida Util</label>
                            <input type="text" class="form-control" id="vida_util" placeholder="" name="vida_util" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo Adquisicion</label>
                            <input type="text" class="form-control" id="costo_adquisicion" placeholder="" name="costo_adquisicion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo Nuevo</label>
                            <input type="text" class="form-control" id="costo_nuevo" placeholder="" name="costo_nuevo" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo Mantenimiento</label>
                            <input type="text" class="form-control" id="costo_mantenimiento" placeholder="" name="costo_mantenimiento" required>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Siguiente' }}
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
