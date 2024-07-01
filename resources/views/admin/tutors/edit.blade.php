@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
<div class="p-4">
    
    <div class="h3 mb-0 text-gray-dark"><h3>Actualizar Tutor</h3></div>
    <p>Complete el formulario para cambiar un tutor del sistema</p>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Datos del Tutor</h3>
                </div>

                <form id="editTutor" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label class="small mb-1" for="tutorName">Nombre</label>
                                <input class="form-control" id="InputTutorName" type="text" name="TutorName" value="{{ $tutor->name }}" placeholder="Nombre de Tutor" >
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="tutorLastName">Apellidos</label>
                                <input class="form-control" id="InputTutorLastName" type="text" name="TutorLastName" value="{{ $tutor->lastname }}" placeholder="Ingrese Apellido" >
                            </div>
                            <div class="col-md-4">
                                <label class="small mb-1" for="tutorCed">Cedula</label>
                                <input class="form-control" id="InputTutorCed" type="text" name="TutorCed" value="{{ $tutor->cedula }}" placeholder="Cedula de Indentidad: XX.XXX.XXX" >
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="tutorMail">Correo Electronico</label>
                                <input class="form-control" id="InputTutorMail" type="text" name="TutorMail" value="{{ $tutor->email }}" placeholder="example@hosting.com" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="tutorPhone">Telefono</label>
                                <input class="form-control" id="InputTutorPhone" type="text" name="TutorPhone" value="{{ $tutor->phone }}" placeholder="Numero de Telefono" >
                            </div>
                        </div>
                        <input type="hidden" name="tutorId" id="tutorId" value="{{ $tutor->id }}">

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

        $('#editTutor').on('submit', function(event) {

            event.preventDefault();

            let Id = $('#tutorId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('/admin/update-tutor') }}" + "/" + Id,
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