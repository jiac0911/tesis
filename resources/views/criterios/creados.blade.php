@extends('layouts.app')

@section('content')
<div class="container ">
    @foreach ($equipos as $equipo)
        <div class="row justify-content-center">
            <div class="col-md-12" >
                <div class="card mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $equipo->nombre }}</h5>
                        @if ($equipo->tecnicos)
                            <a href="#" class="btn btn-info">Modificar Criterios Tecnicos</a>
                        @else
                            <a href="/createTecnicos/{{ $equipo->id }}" class="btn btn-info">Criterios Tecnicos</a>
                        @endif
                        @if ($equipo->clinicos)
                            <a href="#" class="btn btn-info">Modificar Criterios Clinicos</a>
                        @else
                            <a href="/createClinicos" class="btn btn-info">Criterios Clinicos</a>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
@endsection




