@extends('layouts.app')





@section('contenido')



@section('title', 'Inicia Sesión')



@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 p-5">
        <div class="md:w-4/12 flex justify-center">
            <img src="{{asset('images/login.jpg')}}" alt="registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action=" {{route('login') }} " method="POST" >
                @csrf

                @if(session('mensaje'))
                    <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                        {{session('mensaje')}}
                    </p>
                @endif

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
                    <input type="checkbox" name="remember" id="remember"> <label class="text-sm text-gray-500 uppercase hover:cursor-pointer " for="remember">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">
            </form>
        </div>
    </div>
@endsection()


@endsection
