@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Agregar Nuevo Usuario</h3></div>
    <p>Complete el formulario para agregar un nuevo usuario al sistema</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>

                <form id="addUser" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="userName">Nombre</label>
                                <input class="form-control" id="InputUserName" type="text" name="userName" placeholder="Nombre de Usuario" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="userMail">Email</label>
                                <input class="form-control" id="InputUserMail" type="text" name="userMail" placeholder="Ingrese Correo" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="userType">Tipo</label>
                                <select class="custom-select rounded-0" name="userType" id="selectUserType">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($userTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="userPass">Contraseña</label>
                                <input class="form-control" id="InputUserPass" type="password" name="userPass" placeholder="" >
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

        $('#addUser').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/create-user') }}",
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