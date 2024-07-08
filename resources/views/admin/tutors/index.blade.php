@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
    <div class="p-4">
        <div class="h3 mb-0 text-gray-dark"><h3>Listado de Tutores en el sistema</h3></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/admin/tutor/add" class="btn btn-outline-primary float-right">Agregar</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
<<<<<<< HEAD
                            <table class="table table-hover col-lg-12 text-center">
=======
                            <table class="table table-hover col-lg-12 text-center" id="tutorTable">
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
                                <thead class="thead-blue">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Acciones</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allTutor as $tutor)
                                    <tr>
                                        <th scope="row">{{ $tutor->id }}</th>
                                        <td>{{ $tutor->name }}</td>
                                        <td>{{ $tutor->lastname }}</td>
<<<<<<< HEAD
                                        <td>{{ $tutor->phone }}</td>
                                        <td>{{ $tutor->email }}</td>
=======
                                        <td>@php echo $tutor->phone==""?'n/a':$tutor->phone; @endphp</td>
                                        <td>@php echo $tutor->email==""?'n/a':$tutor->email; @endphp</td>
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
                                        <td>
                                            <a href="/admin/tutor/edit/{{ $tutor->id }}"  class="btn btn-info  btn-sm"><i class="fa fa-edit"></i></a>
                                            <a data-id="{{ $tutor->id }}" class="btn btn-danger btn-sm delConfirmButton"><i class="fa fa-trash"></i></a>  
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
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
<<<<<<< HEAD
=======

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
@endpush

{{-- Push extra scripts --}}

@push('js')
<<<<<<< HEAD
=======

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
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
                    url: "{{ url('/admin/delete-tutor') }}" + "/" + ID,
                    type: "GET",
                    success: function(response) {

                        if (response.isSuccess == false) {
                            alert(response.Message);
                        } else if (response.isSuccess == true) {

                            Swal.fire("Borrado", response.Message, "success");

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

<<<<<<< HEAD
=======
        $('#tutorTable').DataTable({
            language: {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "Nada encontrado - disculpa",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay datos disponible",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Busqueda: ",
                        "paginate": {
                            "first":      "Primera",
                            "last":       "Ultima",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        }
                    }

        });

>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
    </script>
@endpush