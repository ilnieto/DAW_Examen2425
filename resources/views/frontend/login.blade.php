    
@extends('index')
@section('title', 'Iniciar sesion')
@section('contenido')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            
            <p>
                @if (session('error'))
                    {{session('error')}}
                @endif
            </p>
            
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>

        </form>
    </div>
@endsection
