
@extends('layouts.app')

@section('title', 'Listado de tareas')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-form-label text-md-end">
            
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Listar</a>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Agregar</a>
                </div>
            </div>
            <br>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                    <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                    <th>Acción</th>  

                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $t)
                    <tr>
                        <td>{{ $t->title }}</td>
                        <td>{{ $t->description }}</td>
                        <td>{{ $t->is_completed()}}</td>
                        <td>
                            <a  href="/tasks/{{$t->id}}/edit" >Editar</a> 
                            <form method="POST" action="/tasks/{{$t->id}}/eliminar" >
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar">
                            </form>
                            @if($t->is_completed() == 'Pendiente')
                            <form method="POST" action="/tasks/{{$t->id}}/finalizar" >
                                @csrf
                                @method('put')
                                <input type="submit" value="Finalizar">
                            </form>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
	    </div>
    </div>
</div>
@endsection