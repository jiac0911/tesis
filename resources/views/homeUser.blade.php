@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion del equipo</div>
                <form method="POST" action="/h">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre del equipo</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Siguiente' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
