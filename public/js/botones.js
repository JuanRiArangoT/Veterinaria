const formulario = document.querySelector('form')
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
