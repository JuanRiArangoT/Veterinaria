document.addEventListener('DOMContentLoaded', function() {

    const calendarEl = document.getElementById('calendar')
    const formulario = document.querySelector('form')
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale: "es",

        headerToolbar: {
            left: 'prev next today',
            center: 'title',
            right: 'dayGridMonth timeGridWeek listWeek'
        },


        slotMinTime: '08:00:00',
        slotMaxTime: '19:00:00',
        slotDuration: '01:00:00',

        hiddenDays: [0],

        //timeZone: 'America/Bogota',

        events: "http://127.0.0.1:8000/home/consultar",



        dateClick: function(info) {
            limpiarFormulario();
            $('#btnAgregar').show();
            $('#btnEditar').hide();
            $('#btnEliminar').hide();
            if (info.allDay) {
              $('#start').val(info.dateStr);
            } else {
              let fechaHora = info.dateStr.split("T");
              $('#start').val(fechaHora[0]);
              $('#FechaFin').val(fechaHora[0]);
              $('#HoraInicio').val(fechaHora[1].substring(0, 5));
            }
            $("#evento").modal("show");
        },

        // eventClick: function(info) {
        //     $('#btnEditar').show();
        //     $('#btnEliminar').show();
        //     $('#btnAgregar').hide();
        //     $('#id').val(info.event.id);
        //     $('#Titulo').val(info.event.title);
        //     $('#Descripcion').val(info.event.extendedProps.descripcion);
        //     $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
        //     $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
        //     $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
        //     $('#end').val(moment(info.event.end).format("HH:mm"));

        //     $("#evento").modal("show");
        //   },


    })
    calendar.render()

    document.getElementById("btnGuardar").addEventListener("click", function(){
        const datos = new FormData(formulario)
        console.log(datos)
        console.log(formulario.id.value)

        axios.post("http://127.0.0.1:8000/home/agregar", datos).then(
            (respuesta) =>{
                calendar.refetchEvents();
                $("#evento").modal('hide');
            }
            ).catch(err=>{
                if(err.response){
                    console.log(err.response.data);
                }
            })
    })


    function limpiarFormulario() {
        $('#Codigo').val('');
        $('#Titulo').val('');
        $('#Descripcion').val('');
        $('#FechaInicio').val('');
        $('#FechaFin').val('');
        $('#HoraInicio').val('');
        $('#HoraFin').val('');
        $('#ColorFondo').val('#3788D8');
        $('#ColorTexto').val('#ffffff');
      }

})

