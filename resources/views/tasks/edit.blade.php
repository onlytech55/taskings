@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group">
                <div class="col-form-label text-md-end">
            
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ir al listado</a>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Agregar</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Editar tarea') }}</div>

                <div class="card-body">

                    <form method="POST" action="/tasks/{{$tasks[0]->id}}/actualizar" >
                        @csrf

                        @method('put')
                        <x-tasks-form-body :tasks="$tasks[0]"></x-tasks-form-body>

                    </form>

                   
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection