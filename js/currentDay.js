$(document).ready(function(){
    n =  new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("fechaActual").value = d + "/" + m + "/" + y;
})