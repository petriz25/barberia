function iniciarApp(){buscarPorFecha()}function buscarPorFecha(){document.querySelector("#fecha").addEventListener("input",(function(t){const a=t.target.value;window.location="?fecha="+a}))}function mostrar(t){let a=t.currentTarget.querySelector(".cita-oculta");a&&(a.classList.contains("activa")?a.classList.remove("activa"):a.classList.add("activa"))}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));