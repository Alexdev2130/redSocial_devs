@extends('layouts.app')


@section('title', $post->titulo)


@section('contenido')


<div class="container mx-auto md:flex">

    <div class="md:w-1/2">
     <img src=" {{asset('uploads/'. $post->imagen)}} " alt="imagen del post">

       <div class="p-3 flex items-center gap-3">
            @auth

                <livewire:like-post :post="$post"  />




            @endauth



       </div>

        <div >
         <p class="font-bold"> {{$post->user->username}} </p>
         <p class="text-sm text-gray-500">
            {{$post->created_at->diffForHumans()}}
         </p>


         <p class="mt-5">
            {{$post->descripcion}}
         </p>
       </div>


     @auth

       @if ($post->user_id === auth()->user()->id)
            <form action=" {{route('posts.destroy', $post->id)}} " method="post">
                @method('DELETE')
                @csrf
                <input class="bg-red-500 text-white hover:bg-red-600 hover:cursor-pointer p-2 rounded font-bold mt-4" type="submit" value="Eliminar publicación">
            </form>
       @endif

     @endauth


    </div>
    <div class="md:w-1/2 p-5">
      <div class="shadow bg-white p-5 mb-5">

        @auth
            <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

            @if(session('mensaje'))
                <p class="font-medium bg-green-500 text-sm uppercase text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                    {{session('mensaje')}}
                </p>
            @endif

            <form action=" {{route('comentarios.store', ['user' => $user, 'post' => $post]) }} " method="POST" >
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-gray-500 uppercase font-bold" for="descripcion">Añade un Comentario:</label>

                    <textarea

                        class="border p-2 w-full rounded-lg
                        @error('comentario')
                        border-red-500 placeholder:text-red-500
                        @enderror"
                        placeholder="comentario de la Publicación"
                        id="comentario"
                        name="comentario">

                    </textarea>

                    @error('comentario')
                        <p class="font-medium bg-red-500 text-sm text-white shadow-sm my-2 p-3 text-center rounded-lg border">
                            {{$message}}
                        </p>
                    @enderror
                </div>



                <input type="submit"
                value="Comentar"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">

            </form>



        @endauth

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
            @if ($post->comentarios->count())

                @foreach ($post->comentarios as $comentario)

                    <div class="p-5 border-gray-300 border-b">

                        <a href=" {{ route('posts.index', $comentario->user->username) }} " class="font-bold text-sm">
                            {{$comentario->user->username}}
                        </a>

                        <p>
                            {{$comentario->comentario}}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{$comentario->created_at->diffForHumans()}}
                        </p>

                    </div>
                @endforeach

            @else
                <p class="p-10 text-center">
                    No hay Comentarios Aún
                </p>
            @endif
        </div>

      </div>
    </div>
</div>




@endsection




