@extends('layouts.app')


@section('title', 'Crea tu Cuenta')



@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 p-5">
        <div class="md:w-4/12 flex justify-center">
            <img src="{{asset('images/registrar.jpg')}}" alt="registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action=" {{route('register') }} " method="POST" >
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="name">Nombre:</label>
                    <input value="{{ old('name') }}" class="border p-2 w-full rounded-lg @error('name') border-red-500 placeholder:text-red-500 @enderror" type="text" placeholder="nombre" id="name" name="name">
                    @error('name')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="username">Username:</label>
                    <input value="{{ old('username') }}" class="border p-2 w-full rounded-lg @error('username') border-red-500 placeholder:text-red-500 @enderror" type="text" placeholder="nombre de usuario" id="username" name="username">
                     @error('username')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="email">E-mail:</label>
                    <input value="{{ old('email') }}" class="border p-2 w-full rounded-lg @error('email') border-red-500 placeholder:text-red-500 @enderror" type="email" placeholder="correo@correo.com" id="email" name="email">
                    @error('email')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="password">Password:</label>
                    <input   class="border p-2 w-full rounded-lg @error('password') border-red-500 placeholder:text-red-500 @enderror" type="password" placeholder="Contraseña" id="password" name="password">
                    @error('password')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="password_confirmation">Repetir Password:</label>
                    <input  class="border p-2 w-full rounded-lg " type="password" placeholder="Repetir Contraseña" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                           {{$message}}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">
            </form>
        </div>
    </div>
@endsection()
