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
                                    <td>{{ $sLines->sName }}</td>
                                    <td>
                                        <a href="/admin/subline/edit/{{ $sLines->id }}"  class="btn btn-info  btn-sm"><i class="fa fa-edit"></i></a>
                                        <a data-id="{{ $sLines->id }}" class="btn btn-danger btn-sm delConfirmButton"><i class="fa fa-trash"></i></a>  
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
    <script> 

        $('.delConfirmButton').click(function (event) {

          event.preventDefault();
          var ID = $(this).attr('data-id');
 

          Swal.fire({
            title: "¿Desea borrar este elemento?",
            text: "No podra deshacer esta accion",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2d5c88",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Si",
            cancelButtonText: "Cancelar"
          }).then(function (result) {

            if (result.value) {

                $.ajax({
                    url: "{{ url('/admin/deleteSubLine-topic') }}" + "/" + ID,
                    type: "GET",
                    success: function(response) {

                        if (response.isSuccess == false) {
                            alert(response.Message);
                        } else if (response.isSuccess == true) {

                            Swal.fire("Borrado", "Se ha Borrado el elemento.", "success");

                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);

                        }

                    },
                    error: function(response) {
                        
                        Swal.fire("Ha ocurrido un error", response.message, "error");

                    }
                });
                
            }

          });

        }); //Parameter

    </script>
@endpush