@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group">
                <div class="col-form-label text-md-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ir al listado</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Crear tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('tasks.store')}}">
                       <x-tasks-form-body/>
                    </form>
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection