@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Editar Usuario</h3></div>
    <p>Complete el formulario para cambiar un nuevo usuario del sistema</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>

                <form id="editUser" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="userName">Nombre</label>
                                <input class="form-control" id="InputUserName" type="text" name="userName" placeholder="Nombre de Usuario" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="userMail">Email</label>
                                <input class="form-control" id="InputUserMail" type="text" name="userMail" value="{{ $user->email }}" placeholder="Ingrese Correo" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="userType">Tipo</label>
                                <select class="custom-select rounded-0" name="userType" id="selectUserType">
                                    <option>Seleccione una Opcion</option>   
                                    @foreach ($userTypes as $type)
                                        <option @php echo $user->type==$type->id?'selected':''; @endphp value="{{ $type->id }}">{{ $type->name }}</option>   
                                    @endforeach         
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="userPass">Contraseña</label>
                                <input class="form-control" id="InputUserPass" type="password" value="{{ $user->password }}" name="userPass" placeholder="" >
                            </div>
                        </div>
                        <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">

                        <button class="btn btn-primary" type="Submit">Confirmar</button>
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

        $('#editUser').on('submit', function(event) {

            event.preventDefault();

            let formData = new FormData(this);
            let Id = $('#userId').val();

            $.ajax({
                url: "{{ url('/admin/update-user') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {

                        Swal.fire("Actualizado", response.Message, "success");

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