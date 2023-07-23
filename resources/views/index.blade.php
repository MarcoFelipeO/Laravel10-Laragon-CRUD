@extends('layouts.base')

@section('content')
<div class="row">
    <br>
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Tareas</h2>
        </div>
        <div>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ Session::get('success') }} <br>
    </div>
    @endif


    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>


            @foreach ($tasks as $tasks)
            <tr>
                <td>{{ $tasks->title }}</td>
                <td>{{ $tasks->description }}</td>
                <td>{{ $tasks->due_date }}</td>
                <td>
                    <span class="badge bg-warning fs-6">{{ $tasks->status }}</span>
                </td>
                <td>
                    <a href="" class="btn btn-warning">Editar</a>

                    
                    
                    <form action="{{route('tasks.destroy', $tasks) }}" method="POST" class="d-inline" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Eliminar tarea</button>
                    </form>
                    
                    
                </td>
            </tr>  
            @endforeach
            
        </table>
</div>
@endsection