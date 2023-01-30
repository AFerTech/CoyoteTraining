let paso=1;const pagInicio=1,pagFinal=3,cita={nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),paginador(),pagAnterior(),pagSiguiente(),consultarApi(),nombreCliente(),seleccionarFecha(),seleccionarHora(),mostrarResumen()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");const t="#paso-"+paso;document.querySelector(t).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",(function(e){paso=parseInt(e.target.dataset.paso),mostrarSeccion(),paginador()}))})}function paginador(){const e=document.querySelector("#anterior"),t=document.querySelector("#siguiente");1===paso?(e.classList.add("ocultar"),t.classList.remove("ocultar")):3===paso?(e.classList.remove("ocultar"),t.classList.add("ocultar"),mostrarResumen()):(e.classList.remove("ocultar"),t.classList.remove("ocultar")),mostrarSeccion()}function pagAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,paginador())}))}function pagSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,paginador())}))}async function consultarApi(){try{const e="http://localhost:3000/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach(e=>{const{id:t,nombre:o,precio:n}=e,a=document.createElement("P");a.classList.add("servicio"),a.textContent=o;const c=document.createElement("P");c.classList.add("precio"),c.textContent="$"+n;const r=document.createElement("DIV");r.classList.add("servicios"),r.dataset.idServicio=t,r.onclick=function(){servicioSeleccionado(e)},r.appendChild(a),r.appendChild(c),document.querySelector("#servicios").appendChild(r)})}function servicioSeleccionado(e){const{id:t}=e,{servicios:o}=cita,n=document.querySelector(`[data-id-servicio="${t}"]`);o.some(e=>e.id===t)?(cita.servicios=o.filter(e=>e.id!==t),n.classList.remove("seleccionado")):(cita.servicios=[...o,e],n.classList.add("seleccionado"))}function nombreCliente(){const e=document.querySelector("#nombre").value;cita.nombre=e}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",(function(e){const t=new Date(e.target.value).getUTCDay();[6,0].includes(t)?(e.target.value="",mostrarAlerta("Sábados y Domingos no disponibles","error",".formulario")):cita.fecha=e.target.value}))}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",(function(e){const t=e.target.value.split(":")[0];t<10||t>18?(e.target.value="",mostrarAlerta("Hora no valida","error",".formulario")):cita.hora=e.target.value}))}function mostrarResumen(){const e=document.querySelector(".contenido-resumen");for(;e.firstChild;)e.removeChild(e.firstChild);if(Object.values(cita).includes("")||0===cita.servicios.length)return void mostrarAlerta("Faltan datos por llenas","error",".contenido-resumen",!1);const{nombre:t,fecha:o,hora:n,servicios:a}=cita,c=document.createElement("H3");c.textContent="Resumen de servicios",e.appendChild(c),a.forEach(t=>{const{id:o,precio:n,nombre:a}=t,c=document.createElement("DIV");c.classList.add("contenedor-servicios");const r=document.createElement("P");r.textContent=a;const s=document.createElement("P");s.innerHTML="<span>Precio;</span> $"+n,c.appendChild(r),c.appendChild(s),e.appendChild(c)});const r=document.createElement("H3");r.textContent="Resumen de cita",e.appendChild(r);const s=document.createElement("P");s.innerHTML="<span>Nombre:</span> "+t;const i=new Date(o),l=i.getMonth(),d=i.getDate()+2,u=i.getFullYear(),m=new Date(Date.UTC(u,l,d)).toLocaleDateString("es-MX",{weekday:"long",year:"numeric",month:"long",day:"numeric"}),p=document.createElement("P");p.innerHTML="<span>Fecha:</span> "+m;const v=document.createElement("P");v.innerHTML=`<span>Hora:</span> ${n} Hrs`;const h=document.createElement("BUTTON");h.classList.add("btn"),h.textContent="Reservar Cita",h.onclick=reservarCita,e.appendChild(s),e.appendChild(p),e.appendChild(v),e.appendChild(h)}async function reservarCita(){(new FormData).append("nombre","alexis");const e=await fetch("http://localhost:3000/api/citas",{method:"POST"}),t=await e.json();console.log(t)}function mostrarAlerta(e,t,o,n=!0){const a=document.querySelector(".alert");a&&a.remove();const c=document.createElement("P");c.textContent=e,c.classList.add("alert"),c.classList.add(t);document.querySelector(o).appendChild(c),n&&setTimeout(()=>{c.remove()},3e3)}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));