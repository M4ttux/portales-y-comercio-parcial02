@extends('layout.app')

@section('title', 'Inicio')

@section('carrousel')
    @include('components.carousel')
@endsection

@section('content')
    @include('components.about')
    @include('components.valores')
    @include('components.productos')
    @include('components.id')
    @include('components.noticias')
@endsection
