@extends('app')

@section('content')


<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('todos')}}">
        @csrf

        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
            <div class="mb3">
    <label for="title" class="form-label">Titulo de la tarea</label>
    <input type="title" name="title" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
    </form>
</div>

<div >
        @foreach ($todos as $todo)
        
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
@endsection