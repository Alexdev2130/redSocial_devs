@extends('layouts.app')

@section('title', 'Crear una Nueva Publicación')

@push('styles')
       <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

<div class="md:flex md:items-center">

    <div class="md:w-1/2 px-10">
        <form action=" {{route('imagenes.store')}} " method="POST" enctype="multipart/form-data" id="Dropzone" class="dropzone border-dashed w-full border-2 h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>

    <div class=" px-10 md:w-4/12 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
        <form action=" {{route('posts.store') }} " method="POST" >
            @csrf
            <div class="mb-5">
                <label class="mb-2 block text-gray-500 uppercase font-bold" for="titulo">Titulo:</label>

                <input value="{{ old('titulo') }}"
                class="border p-2 w-full rounded-lg
                @error('titulo')
                 border-red-500 placeholder:text-red-500
                @enderror"
                type="text"
                placeholder="Titulo de la Publicación"
                id="titulo"
                name="titulo">

                @error('titulo')
                    <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="mb-2 block text-gray-500 uppercase font-bold" for="descripcion">Descripción:</label>

                <textarea

                class="border p-2 w-full rounded-lg
                @error('descripcion')
                 border-red-500 placeholder:text-red-500
                @enderror"
                placeholder="descripcion de la Publicación"
                id="descripcion"
                name="descripcion">

                    {{ old('descripcion') }}

                </textarea>

                @error('descripcion')
                    <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                        {{$message}}
                    </p>
                @enderror
            </div>

              <div class="mb-5">
                <input type="hidden" name="imagen" value=" {{old('imagen')}} ">

                @error('imagen')
                    <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                        {{$message}}
                    </p>
                @enderror
              </div>

            <input type="submit"
             value="Crear Publicación"
             class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">
        </form>
    </div>
</div>

@endsection
