@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @auth
        <h3 class="text-center text-lg font-bold text-sky-600 mb-4">Últimos posts de usuarios que sigues</h3>
    @endauth
    @guest
        <h3 class="text-center text-lg font-bold text-sky-600">Últimos posts que han subido usuarios</h3>
        <h3 class="text-center text-lg font-bold text-pink-800 mb-4">(Inicia Sesión o Registrate para ver los ultimos posts de usuarios que sigas)</h3>
    @endguest
    <x-listar-post :posts="$posts"/>

    <h3 class="text-center text-lg font-bold text-sky-600 mb-4">Últimos usuarios creados</h3>
    <div class="flex flex-row justify-center">
            @foreach ($users as $user)

                <div class="px-4 w-32 h-32">
                    <a href="{{ route('posts.index', $user) }}">
                        <img class="rounded-full" src="{{ $user->imagen ? asset('perfiles'). '/' . $user->imagen : asset('img/usuario.svg') }}" alt="Imagen de usuario">
                    </a>
                </div>
                
            @endforeach
    </div>


@endsection