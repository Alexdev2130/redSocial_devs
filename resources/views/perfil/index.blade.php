@extends('layouts.app')


@section('title', 'Modificar Perfil: '. auth()->user()->username )



@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action=" {{route('perfil.store', $user)}} " method="post" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="username">Username:</label>
                    <input value="{{ auth()->user()->username }}" class="border p-2 w-full rounded-lg @error('username') border-red-500 placeholder:text-red-500 @enderror" type="text" placeholder="nombre de usuario" id="username" name="username">
                     @error('username')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="email">Email:</label>
                    <input value="{{ auth()->user()->email }}" class="border p-2 w-full rounded-lg @error('email') border-red-500 placeholder:text-red-500 @enderror" type="email" placeholder="nombre de usuario" id="username" name="email">
                     @error('email')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="imagen">Imagen del Perfil:</label>
                    <input class="border p-2 w-full rounded-lg" type="file" accept=".jpg, .jpeg, .png, .svg"  id="imagen" name="imagen">
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="password_actual">Password:</label>
                    <input   class="border p-2 w-full rounded-lg @error('password_actual') border-red-500 placeholder:text-red-500 @enderror" type="password" placeholder="Contraseña Actual" id="password_actual" name="password">
                    @error('password_actual')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="password_nuevo">Nuevo Password:</label>
                    <input  class="border p-2 w-full rounded-lg " type="password" placeholder="Nueva Contraseña" id="password_nuevo" name="password_nuevo">
                    @error('password_nuevo')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                @if(session('mensaje'))
                    <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                        {{session('mensaje')}}
                    </p>
                @endif

                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">
            </form>
        </div>
    </div>

@endsection
