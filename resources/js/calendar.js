document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");
    const formulario = document.querySelector("form");
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",

        locale: "es",

        headerToolbar: {
            left: "prev next today",
            center: "title",
            right: "dayGridMonth timeGridWeek listWeek",
        },

        slotMinTime: "08:00:00",
        slotMaxTime: "19:00:00",
        slotDuration: "01:00:00",

        hiddenDays: [0],

        //timeZone: 'America/Bogota',

        events: "http://phplaravel-915525-3181396.cloudwaysapps.com/index/consultar",

        dateClick: function (info) {

            const date = new Date();
            const anio = date.getFullYear();
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const fechaActual = anio + "-" + month.toString().padStart(2, 0) + "-" + day;
            const fechaSelec =  info.dateStr;

            if(fechaSelec < fechaActual){
                alert("La fecha seleccionada es menor a la actual")
            }else{
                $("#btnGuardar").show();
                $("#btnEditar").hide();
                $("#btnEliminar").hide();
                formulario.reset();
                formulario.dateStart.value = info.dateStr;
                $("#evento").modal("show");
            }

        },

        eventClick: function (info) {

            $("#btnEditar").show();
            $("#btnEliminar").show();
            $("#btnGuardar").hide();

            axios
                .post(baseURL + "/index/editar/" + info.event.id)
                .then((respuesta) => {
                    const date = new Date();
                    const anio = date.getFullYear();
                    const month = date.getMonth() + 01;
                    const day = date.getDate();
                    const fechaActual = new Date(anio + "-" + month.toString().padStart(2, 0) + "-" + day).getTime();
                    let options = {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: false
                    };
                    const horaActual = parseInt(date.toLocaleTimeString('en-US', options));
                    const fechaCita = new Date(respuesta.data.fecha).getTime();
                    const horaCita = parseInt(respuesta.data.hora);
                    const diferencia = horaCita - horaActual;

                    if (fechaActual >= fechaCita) {

                        if (diferencia > 2) {
                            formulario.id.value = respuesta.data.id;
                            formulario.nombres.value = respuesta.data.nombres;
                            formulario.apellidos.value = respuesta.data.apellidos;
                            formulario.title.value = respuesta.data.title;
                            formulario.dateStart.value = respuesta.data.fecha;
                            formulario.hourStart.value = respuesta.data.hora;
                            $("#evento").modal("show");
                        } else {
                            alert("No se puede modificar o eliminar la cita porque faltan menos de horas")
                        }

                    }else{
                            formulario.id.value = respuesta.data.id;
                            formulario.nombres.value = respuesta.data.nombres;
                            formulario.apellidos.value = respuesta.data.apellidos;
                            formulario.title.value = respuesta.data.title;
                            formulario.dateStart.value = respuesta.data.fecha;
                            formulario.hourStart.value = respuesta.data.hora;
                            $("#evento").modal("show");
                    }

                })
                .catch((err) => {
                    if (err.response) {
                        console.log(err.response.data);
                    }
                });
        },
    });
    calendar.render();

    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            enviarDatos("/index/agregar");
        });

    document
        .getElementById("btnEliminar")
        .addEventListener("click", function () {
            enviarDatos("/index/eliminar/" + formulario.id.value);
        });

    document
        .getElementById("btnEditar")
        .addEventListener("click", function () {
            enviarDatos("/index/actualizar/" + formulario.id.value);
        });

    function enviarDatos(url) {
        const datos = new FormData(formulario);
        const nUrl = baseURL + url;
        axios
            .post(nUrl, datos)
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");
                console.log(respuesta);
            })
            .catch((err) => {
                if (err.response) {
                    console.log(err.response.data);
                    alert("No se registro el evento");
                }
            });
    }
});
