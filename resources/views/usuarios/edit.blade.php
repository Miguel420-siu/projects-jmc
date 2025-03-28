@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Editar Usuario</h2>
        @include('usuarios.form', ['route' => route('usuarios.update', $usuario->id), 'method' => 'PUT'])
    </div>
@endsection