@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Sub-Linea')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Listado de Sub Lineas de Investigacion</p>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/subline/add" class="btn btn-outline-success float-right">Agregar</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Linea</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSlines as $sLines)
                                <tr>
                                    <th scope="row">{{ $sLines->id }}</th>
                                    <td>{{ $sLines->name }}</td>
                                    <td>{{ $sLines->subline }}</td>
                                    <td>
                                        <a href="#"  class="btn btn-info  btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i></a>  
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
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