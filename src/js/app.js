
let paso =1;
const pagInicio= 1;
const pagFinal =3;

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});


function iniciarApp(){
    mostrarSeccion(); //muestra y oculta seccion
    tabs(); //cambia la sesion cuando se precionan los tabs
    paginador(); //agrega o quitar botones del paginador
    pagAnterior(); // regresa a la pag anterior
    pagSiguiente();// avanza a la siguiente pag
}


function mostrarSeccion(){
    // ocultando y mostrando seccion
    const seccionAnterior= document.querySelector('.mostrar');
    if(seccionAnterior){

        seccionAnterior.classList.remove('mostrar');
    }
    const pasoSelector= `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');


    // resaltando segun la seccion actual
    const tabAnterior= document.querySelector('.actual');
    if(tabAnterior){

        tabAnterior.classList.remove('actual');
    }
    const tab= document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
  
}

function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach(boton=>{
        boton.addEventListener('click', function(e){
           paso = parseInt( e.target.dataset.paso);
           mostrarSeccion();
           paginador();
        });
    });
}

function paginador(){
    const anterior= document.querySelector('#anterior');
    const siguiente= document.querySelector('#siguiente');

    if(paso ===1){
        anterior.classList.add('ocultar');
        siguiente.classList.remove('ocultar');
    }else if(paso ===3){
        anterior.classList.remove('ocultar');
        siguiente.classList.add('ocultar');
    }else{
        anterior.classList.remove('ocultar');
        siguiente.classList.remove('ocultar');

    }
    mostrarSeccion();
}

function pagAnterior(){
    const anterior = document.querySelector('#anterior');
    anterior.addEventListener('click', function(){
        if(paso <= pagInicio) return;
        paso--;

        paginador();
        
    });
}
function pagSiguiente(){
    const siguiente = document.querySelector('#siguiente');
    siguiente.addEventListener('click', function(){
        if(paso >= pagFinal) return;
        paso++;

        paginador();
        
    });

}