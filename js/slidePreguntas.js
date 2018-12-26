$(document).ready(function(){
    document.getElementById("pregunta1").removeAttribute("hidden");
});

function siguientePregunta(cont) {
    document.getElementById("pregunta"+cont).setAttribute("hidden", true);
    cont++;
    document.getElementById("pregunta"+cont).removeAttribute("hidden");
}