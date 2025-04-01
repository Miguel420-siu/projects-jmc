@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Editar Usuario</h2>
        @include('users.form', ['route' => route('users.update', $user->id), 'method' => 'PUT'])
    </div>
@endsection
