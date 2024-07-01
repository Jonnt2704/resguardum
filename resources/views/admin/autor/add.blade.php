@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Agregar Nuevo Autor</h3></div>
    <p>Complete el formulario para agregar un nuevo autor al sistema</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Autor</h3>
                </div>

                <form id="addAutor" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label class="small mb-1" for="autorName">Nombre</label>
                                <input class="form-control" id="InputAutorName" type="text" name="autorName" placeholder="Nombre de autor" >
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="autorLastName">Apellidos</label>
                                <input class="form-control" id="InputAutorLastName" type="text" name="autorLastName" placeholder="Ingrese Apellido" >
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="autorCed">Cedula</label>
                                <input class="form-control" id="InputAutorCed" type="text" name="autorCed" placeholder="Cedula de Indentidad: XX.XXX.XXX" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="autorMail">Correo Electronico</label>
                                <input class="form-control" id="InputAutorMail" type="text" name="autorMail" placeholder="example@hosting.com" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="autorPhone">Telefono</label>
                                <input class="form-control" id="InputAutorPhone" type="text" name="autorPhone" placeholder="Numero de Telefono" >
                            </div>
                        </div>
                        <button class="btn btn-primary" type="Submit">Guardar</button>
                    </div>

            </div>

                </form>
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

        $('#addAutor').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/create-autor') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Registrado", response.Message, "success");

                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }

                },
                error: function(response, exception, message) {
                    
                    Swal.fire("Ha ocurrido un error", message, "error");

                }
            });
    });

    </script>
@endpush