@extends('layout.app')

@section('title', 'Login')

@section('content')
<div id="login">
    <div class="container py-5" style="max-width: 500px;">

        <div class="title col-md-6 mb-4 mb-md-0 my-4 pb-4">
            <h2 class="position-relative d-inline-block mx-4">Login</h2>
        </div>

        <div class="bg-light p-4 rounded-3 shadow-sm">
            <form method="POST" action="{{ route('auth.authenticate') }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Email address</label>
                    <input 
                        type="email" 
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        name="email" 
                        aria-describedby="emailHelp" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted mx-1">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control rounded-m shadow-sm px-4 py-2 border-0 focus-ring" 
                        required
                    >
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-danger btn-lg my-3">Iniciar sesión</button>
                </div>

                <p class="text-center small">
                    ¿No tenés cuenta?
                    <a href="{{ url('/register') }}">Registrate acá</a>.
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
