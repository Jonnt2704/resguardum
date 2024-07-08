@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Inicio')
@section('content_header_subtitle', 'Bienvenido')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Bienvenido al Panel de Administracion del Repositorio de la Universidad de Margarita.</p>
<<<<<<< HEAD
=======
  
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush