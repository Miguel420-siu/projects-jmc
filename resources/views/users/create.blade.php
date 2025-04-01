@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Registrar Usuario</h2>
        @include('users.form', ['route' => route('users.store'), 'method' => 'POST'])
    </div>
@endsection
