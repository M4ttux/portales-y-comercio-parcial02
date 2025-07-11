@extends('layout.app')

@section('title', 'Registro')

@section('content')
<div id="register">
    <div class="container py-5" style="max-width: 500px;">

        <div class="title col-md-6 mb-4 mb-md-0 my-4 pb-4">
            <h2 class="position-relative d-inline-block mx-4">Registro</h2>
        </div>

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo un problema con tu registro:<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-light p-4 rounded-3 shadow-sm">
            <form method="POST" action="{{ route('auth.register.post') }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Nombre</label>
                    <input 
                        type="text" 
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Email address</label>
                    <input 
                        type="email" 
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Contraseña</label>
                    <input 
                        type="password" 
                        name="password"
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Confirmar contraseña</label>
                    <input 
                        type="password" 
                        name="password_confirmation"
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        required
                    >
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-danger btn-lg my-3">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
