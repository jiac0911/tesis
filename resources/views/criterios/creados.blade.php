@extends('layouts.app')

@section('content')
<div class="container ">
    @foreach ($equipos as $equipo)
        <div class="row justify-content-center">
            <div class="col-md-12" >
                <div class="card mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $equipo->nombre }}</h5>
                            <a href="/createTecnicos/{{ $equipo->id }}" class="btn btn-info">Criterios Tecnicos</a>
                            <a href="/createClinicos/{{ $equipo->id }}" class="btn btn-info">Criterios Clinicos</a>
                            <a href="/score/{{ $equipo->id }}" class="btn btn-info">Calcular</a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
@endsection




