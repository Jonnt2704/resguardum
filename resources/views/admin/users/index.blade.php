@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')


{{-- Content body: main page content --}}

@section('content_body')
    <div class="p-4">
        <div class="h3 mb-0 text-gray-dark"><h3>Listado de Usuarios del Sistema</h3></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/admin/user/add" class="btn btn-outline-primary float-right">Agregar</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
<<<<<<< HEAD
                            <table class="table table-hover col-lg-12 text-center">
=======
                            <table class="table table-hover col-lg-12 text-center" id="userTable">
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
                                <thead class="thead-blue">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Acciones</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }}</td>
<<<<<<< HEAD
                                        <td>ADMINISTRADOR</td>
=======
                                        <td>@php echo $user->type=="1"?'ADMINISTRADOR':'ESTUDIANTE'; @endphp</td>
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
                                        <td>
                                            <a href="/admin/user/edit/{{ $user->id }}"  class="btn btn-info  btn-sm"><i class="fa fa-edit"></i></a>
                                            <a data-id="{{ $user->id }}" class="btn btn-danger btn-sm delConfirmButton"><i class="fa fa-trash"></i></a>  
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
<<<<<<< HEAD
            title: "¿Desea borrar este Trabajo?",
=======
            title: "¿Desea borrar este Usuario?",
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
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
                    url: "{{ url('/admin/delete-user') }}" + "/" + ID,
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
        $('#userTable').DataTable({
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