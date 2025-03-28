@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Registrar Usuario</h2>
        @include('usuarios.form', ['route' => route('usuarios.store'), 'method' => 'POST'])
    </div>
@endsection