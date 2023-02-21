let paso = 1;

document.addEventListener('DOMContentLoaded', function(){
    inciarApp();
});

function inciarApp(){
    tabs(); //Cambia la seccion cuando se presionan los tabs
};

function mostrarSeccion(){
    
}

function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach( boton => {
        boton.addEventListener('click', function(e){
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
        });
    })
}