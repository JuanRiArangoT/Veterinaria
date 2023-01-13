<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
        integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js"
        integrity="sha512-C92U8X5fKxCN7C6A/AttDsqXQiB7gxwvg/9JCxcqR6KV+F0nvMBwL4wuQc+PwCfQGfazIe7Cm5g0VaHaoZ/BOQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"
        integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css"
        rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>


<body>
    <div class="container">
        <div id='calendar'></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Cita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" class="row g-3 needs-validation was-validated" novalidate>

                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="id" class="form-label"> Documento del cliente.</label>
                            <input type="text" class="form-control" name="id" id="id"
                                aria-describedby="helpId" placeholder="Documento del cliente" required>

                        </div>

                        <div class="form-group">
                            <label for="nombres" class="form-label"> Nombres del cliente.</label>
                            <input type="text" class="form-control" name="nombres" id="nombres"
                                aria-describedby="helpId" placeholder="Nombres del cliente" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos" class="form-label"> Apellidos del cliente.</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                aria-describedby="helpId" placeholder="Apellidos del cliente" required>
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label"> Nombre de la mascota.</label>
                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpId" placeholder="Nombre de la mascota" required>
                        </div>

                        <div class="form-group">
                            <label for="dateStart" class="form-label"> Fecha de la cita.</label>
                            <input type="date" class="form-control" name="dateStart" id="dateStart"
                                aria-describedby="helpId" placeholder="" required>
                        </div>

                        <div class="container form-group">
                            <div class="row form-group">
                                <div class="col-sm-6 form-group">
                                    <label for="hourStart" class="form-label"> Hora de la cita</label>
                                    <div class="input-group" id="datetimepicker1" data-td-target-input="nearest"
                                        data-td-target-toggle="nearest">
                                        <input name="hourStart"  id="hourStart" type="text" class="form-control"
                                            data-td-target="#datetimepicker1" required/>
                                        <span class="input-group-text" data-td-target="#datetimepicker1"
                                            data-td-toggle="datetimepicker">
                                            <span class="fa-solid fa-clock"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btnGuardar"> Guardar</button>
                            <button type="button" class="btn btn-outline-success" id="btnEditar"> Editar</button>
                            <button type="button" class="btn btn-danger" id="btnEliminar"> Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancelar</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>



    {{-- <script src="{{ asset('js/botones.js') }}"></script> --}}
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/dateTimePicker.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        const baseURL = {!! json_encode(url('/'))!!}
    </script>

</body>


</html>
