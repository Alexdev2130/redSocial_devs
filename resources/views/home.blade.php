@extends('layouts.app')

@section('title', 'Página Principal')



@section('contenido')

    <x-listar-post :posts="$posts" />


@endsection()
