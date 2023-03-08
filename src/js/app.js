let paso = 1;
const pasoInicio = 1;
const pasoFinal = 3;

const cita = {
    id: '',
    nombre: '',
    fecha: '',
    hora: '',
    empleado: '',
    servicios:  []
}

document.addEventListener('DOMContentLoaded', function(){
    inciarApp();
});

function inciarApp(){
    mostrarSeccion();
    tabs(); //Cambia la seccion cuando se presionan los tabs
    botonesPaginador(); //Agrega o quita los botones del paginador
    paginaSiguiente();
    paginaAnterior();

    consultarAPI();//Consulta la API en el back-end de php

    idCliente(); 
    nombreCliente(); //Añade el nombre del cliente al objeto de cita
    seleccionarFecha(); //Añade la fecha de cita en el objeto
    seleccionarHora(); //Añade la hora de cita en el objeto

    mostrarResumen(); //Mostrar el resumen de la cita
};

function mostrarSeccion(){
    //Ocultar la seccion que tenga la clase de mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior){
        seccionAnterior.classList.remove('mostrar');
    }

    //Seleccionar la seccion con el paso...
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');

    //Quita la clase de actual al tab anterior
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior){
        tabAnterior.classList.remove('actual');
    }

    //Resalta el tab actual 
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
}

function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach( boton => {
        boton.addEventListener('click', function(e){
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();

            botonesPaginador();
        });
    })
}

function botonesPaginador(){
    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');

    if(paso === 1){
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }else if(paso === 3){
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');
        mostrarResumen(); 
    }else{
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion();
    
}

function paginaAnterior(){
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function(){
        if(paso <= pasoInicio) return;
        paso--;
        botonesPaginador();
    });
}

function paginaSiguiente(){
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function(){
        if(paso >= pasoFinal) return;
        paso++;
        botonesPaginador();
    });
}

async function consultarAPI(){

    try {
        const url = 'http://localhost:4000/api/servicios';
        const resultado = await fetch(url);
        const servicios = await resultado.json();
        mostrarServicios(servicios);

    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios){
    servicios.forEach(servicio => {
        const { id, nombre, precio } =servicio;

        const nombreServicio = document.createElement('P');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `$${precio}`;

        const servicioDiv = document.createElement('DIV');
        servicioDiv.classList.add('servicio');
        servicioDiv.dataset.idServicio = id;
        servicioDiv.onclick = function(){
            seleccionarServicio(servicio);
        }

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);

        document.querySelector('#servicios').appendChild(servicioDiv);
    })
}

function seleccionarServicio(servicio){
    const { id } = servicio;
    const { servicios } = cita;
    //Identifica el elemento al que se le da click
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);
    //Comprobar si el servicio ya fue agregado
    if( servicios.some( agregado => agregado.id === id ) ){
        //Eliminarlo
        divServicio.classList.remove('seleccionado');
        cita.servicios = servicios.filter( agregado => agregado.id !== id);
    }else{
        //Agregarlo
        divServicio.classList.add('seleccionado');
        cita.servicios = [...servicios, servicio];
    }
}

function idCliente(){
    cita.id = document.querySelector('#id').value;
}

function seleccionarEmpleado(){
    cita.empleado = document.querySelector('#empleado').value;
}

function nombreCliente(){
    cita.nombre = document.querySelector('#nombre').value;
}

function seleccionarFecha(){
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e){
        cita.fecha = e.target.value;

        //Dias que no se trabajan
        //var dia = new Date(e.target.value).getUTCDay();

        // if([6,0].includes(dia)){
        //     e.target.value= '';
        //     mostrarAlerta('Fines de semana no permitidos', 'error');
        // }else{
        //     cita.fecha = e.target.value;
        // }
    })
}

function seleccionarHora(){
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', function(e){
        const dia = new Date(cita.fecha).getUTCDay();
        const horaCita = e.target.value;
        const hora = horaCita.split(":")[0];

        if(dia === 0){
            if(hora<10 || hora>17){
                e.target.value = '';
                mostrarAlerta('Horarios del dia Domingo son de 10am a 06pm', 'error', '.formulario');
            }
        }else if(dia === 6){
            if(hora<10 || hora>19){
                e.target.value = '';
                mostrarAlerta('Horarios del dia Sabado son de 10am a 08pm', 'error', '.formulario');
            }
        }else if(hora<12 || hora>19){
            e.target.value = '';
            mostrarAlerta('Horarios entre semana son de 10am a 08pm', 'error', '.formulario');
        }else{
            cita.hora = e.target.value;
        }
    })
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true){
    //Previene que se genere mas de una alerta
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia){
        alertaPrevia.remove();
    }

    //Scriptin para una alerta
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece){
        //Eliminar la alerta
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

function mostrarResumen(){
    seleccionarEmpleado(); //Añadimos el empleado que atendera la cita

    const resumen = document.querySelector('.contenido-resumen');

    //Limpiar el contenido de resumen 
    while(resumen.firstChild){
        resumen.removeChild(resumen.firstChild);
    }

    if(Object.values(cita).includes('') || cita.servicios.length === 0){
        mostrarAlerta('Faltan datos para su cita', 'error', '.contenido-resumen', false);
        return;
    }

    // Formatear el div de resumen 
    const { nombre, fecha, hora, servicios } = cita;

    //Heading para servicios en resumen
    const headingServicios =document.createElement('H3');
    headingServicios.textContent = 'Resumen de su cita'
    resumen.appendChild(headingServicios);


    //Iterando y mostrando los servicios
    servicios.forEach(servicio =>{
        const { id, precio, nombre } = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML= `<span>Precio:</span> $${precio}`;

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        resumen.appendChild(contenedorServicio);
    });

    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;

    //Formatear la fecha en español
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2;
    const year = fechaObj.getFullYear();

    const fechaUTC = new Date(Date.UTC(year, mes, dia));
    const opciones = {weekday: 'long', year: 'numeric', month: 'long', day:'numeric' };
    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones);

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha:</span> ${fechaFormateada}`;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Hora:</span> ${hora}`;

    //Boton para crear una cita
    const botonReservar = document.createElement('BUTTON');
    botonReservar.classList.add('boton');
    botonReservar.textContent= 'Reservar Cita';
    botonReservar.onclick = reservarCita;

    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    resumen.appendChild(horaCita);

    resumen.appendChild(botonReservar);
}

async function reservarCita(){
    const { id, nombre, fecha, hora, servicios, empleado} = cita;
    const idServicios = servicios.map(servicio => servicio.id);

    const datos = new FormData();
    datos.append('fecha', fecha);
    datos.append('hora', hora);
    datos.append('usuariosId', id);
    datos.append('empleadoId', empleado);
    datos.append('servicios', idServicios);

    try {
        //Petición hacia la api 
    const url = 'http://localhost:4000/api/citas';

    const respuesta = await fetch(url, {
        method: 'POST', 
        body: datos
    })

    const resultado = await respuesta.json();
    console.log(resultado.resultado);

    if(resultado.resultado){
        Swal.fire({
            icon: 'success',
            title: 'Cita Creada',
            text: 'Tu cita fue creada correctamente',
            button: 'OK'
          }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
          })
    }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al guardar la cita'
          })
    }
 }