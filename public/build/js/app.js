let paso=1;const pagInicio=1,pagFinal=3;function iniciarApp(){mostrarSeccion(),tabs(),paginador(),pagAnterior(),pagSiguiente()}function mostrarSeccion(){const t=document.querySelector(".mostrar");t&&t.classList.remove("mostrar");const o="#paso-"+paso;document.querySelector(o).classList.add("mostrar");const e=document.querySelector(".actual");e&&e.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach(t=>{t.addEventListener("click",(function(t){paso=parseInt(t.target.dataset.paso),mostrarSeccion(),paginador()}))})}function paginador(){const t=document.querySelector("#anterior"),o=document.querySelector("#siguiente");1===paso?(t.classList.add("ocultar"),o.classList.remove("ocultar")):3===paso?(t.classList.remove("ocultar"),o.classList.add("ocultar")):(t.classList.remove("ocultar"),o.classList.remove("ocultar")),mostrarSeccion()}function pagAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,paginador())}))}function pagSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,paginador())}))}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));