
let paso =1;

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});


function iniciarApp(){
    mostrarSeccion();
    tabs(); //cambia la sesion cuando se precionan los tabs
}


function mostrarSeccion(){


    // ocultando la seccion
    const seccionAnterior= document.querySelector('.mostrar');
    if(seccionAnterior){

        seccionAnterior.classList.remove('mostrar');
    }

    // selecciona la seccion con el paso
    const pasoSelector= `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');

    
    const tabAnterior= document.querySelector('.actual');
    if(tabAnterior){

        tabAnterior.classList.remove('actual');
    }
    
    // resaltando la seccion actual
    const tab= document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');

    
}



function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach(boton=>{
        boton.addEventListener('click', function(e){
           paso = parseInt( e.target.dataset.paso);
           mostrarSeccion();
        });
    });
}