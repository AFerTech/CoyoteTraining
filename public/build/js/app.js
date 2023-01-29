let paso=1;const pagInicio=1,pagFinal=3,cita={nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),paginador(),pagAnterior(),pagSiguiente(),consultarApi(),nombreCliente(),seleccionarFecha(),seleccionarHora(),mostrarResumen()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");const t="#paso-"+paso;document.querySelector(t).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",(function(e){paso=parseInt(e.target.dataset.paso),mostrarSeccion(),paginador()}))})}function paginador(){const e=document.querySelector("#anterior"),t=document.querySelector("#siguiente");1===paso?(e.classList.add("ocultar"),t.classList.remove("ocultar")):3===paso?(e.classList.remove("ocultar"),t.classList.add("ocultar"),mostrarResumen()):(e.classList.remove("ocultar"),t.classList.remove("ocultar")),mostrarSeccion()}function pagAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,paginador())}))}function pagSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,paginador())}))}async function consultarApi(){try{const e="http://localhost:3000/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach(e=>{const{id:t,nombre:o,precio:a}=e,c=document.createElement("P");c.classList.add("servicio"),c.textContent=o;const r=document.createElement("P");r.classList.add("precio"),r.textContent="$"+a;const n=document.createElement("DIV");n.classList.add("servicios"),n.dataset.idServicio=t,n.onclick=function(){servicioSeleccionado(e)},n.appendChild(c),n.appendChild(r),document.querySelector("#servicios").appendChild(n)})}function servicioSeleccionado(e){const{id:t}=e,{servicios:o}=cita,a=document.querySelector(`[data-id-servicio="${t}"]`);o.some(e=>e.id===t)?(cita.servicios=o.filter(e=>e.id!==t),a.classList.remove("seleccionado")):(cita.servicios=[...o,e],a.classList.add("seleccionado"))}function nombreCliente(){const e=document.querySelector("#nombre").value;cita.nombre=e}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",(function(e){const t=new Date(e.target.value).getUTCDay();[6,0].includes(t)?(e.target.value="",mostrarAlerta("Sábados y Domingos no disponibles","error",".formulario")):cita.fecha=e.target.value}))}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",(function(e){const t=e.target.value.split(":")[0];t<10||t>18?(e.target.value="",mostrarAlerta("Hora no valida","error",".formulario")):cita.hora=e.target.value}))}function mostrarResumen(){document.querySelector(".contenido-resumen");Object.values(cita).includes("")||0===cita.servicios.length?mostrarAlerta("Faltan datos por llenas","error",".contenido-resumen",!1):console.log("datos llenados correctamente")}function mostrarAlerta(e,t,o,a=!0){const c=document.querySelector(".alert");c&&c.remove();const r=document.createElement("P");r.textContent=e,r.classList.add("alert"),r.classList.add(t);document.querySelector(o).appendChild(r),a&&setTimeout(()=>{r.remove()},3e3)}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));