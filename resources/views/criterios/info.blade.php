@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información del equipo</div>
                <div class="card-body">
                    <form method="POST" action="/equipo">
                    {{ csrf_field() }}
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre del equipo*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Marca</label>
                            <input type="text" class="form-control" id="marca" placeholder="" name="marca" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Serie</label>
                            <input type="text" class="form-control" id="serie" placeholder="" name="serie" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Ubicación*</label>
                            <input type="text" class="form-control" id="ubicacion" placeholder="" name="ubicacion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="" name="codigo" >
                        </div>


                        {{-- Lo siguiente calcula la relacion edad y vida util --}}


                        <div class="col-md-6 mb-3">
                            <label for="firstName">Edad*</label>
                            <input type="text" class="form-control" id="edad" placeholder="" name="edad" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Vida Útil*</label>
                            <input type="text" class="form-control" id="vida_util" placeholder="" name="vida_util" required>
                        </div>


                        {{-- Lo siguiente los criterios economicos --}}


                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo que tuvo el equipo*</label>
                            <input type="text" class="form-control" id="costo_adquisicion" placeholder="" name="costo_adquisicion" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo de Nuevo*</label>
                            <input type="text" class="form-control" id="costo_nuevo" placeholder="" name="costo_nuevo" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Costo de Mantenimiento Anual*</label>
                            <input type="text" class="form-control" id="costo_mantenimiento" placeholder="" name="costo_mantenimiento" required>
                        </div>


                        {{-- Lo siguiente calcula eficiencia y tasa de falla --}}


                        <div class="col-md-6 mb-3">
                            <label for="parado">Tiempo Parado Que Debió Operar (Horas)*</label>
                            <input type="text" class="form-control" id="tiempo_parado" placeholder="" name="tiempo_parado" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="operacion">Tiempo en Operación (Horas)*</label>
                            <input type="text" class="form-control" id="tiempo_operacion" placeholder="" name="tiempo_operacion" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="reparaciones">Número de Reparaciones*</label>
                            <input type="text" class="form-control" id="nro_reparaciones" placeholder="" name="nro_reparaciones" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="años_rep">Número de años en que se hicieron las reparaciones*</label>
                            <input type="text" class="form-control col-md-6" id="años_reparaciones" placeholder="" name="años_reparaciones" required>
                        </div>
                        <div class="form-group row ">
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
