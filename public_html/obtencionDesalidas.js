document.addEventListener("DOMContentLoaded", function () {
    const boton = document.getElementById("Aceptar");
    const cui = document.getElementById("dpi");
    const voto = document.getElementById("intencion");

    boton.addEventListener("click", function () {
        const valorCui = cui.value;
        const valorVoto = voto.value;
        alert("Tu número de DPI es: " + valorCui);
        
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "backEnd/controlador.php?parametrocui="+valorCui+"&parametroVoto="+valorVoto, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Entraste a php");
                    // Mostrar el mensaje recibido desde PHP en una alerta
                    alert(xhr.responseText);
                } else {
                    alert ("Algo falló");
                }
            }
        };

        xhr.send();
    });
});
