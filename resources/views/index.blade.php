@extends('layouts.template')

@section('title', 'FerreteriaLibre')

@section('content')

<h2>Hola Mundo</h2>
<a href="{{ route('dashboard') }}">dashboard</a>
<a href="{{ route('register') }}">registrar</a>
<a href="{{ route('login') }}">iniciar sesion</a>
@endsection