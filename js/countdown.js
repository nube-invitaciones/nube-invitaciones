// Fecha objetivo para el contador (puedes ajustar esta fecha)
var countDownDate = new Date("Dec 07, 2025 15:00:00").getTime();

// Actualiza el contador cada segundo
var x = setInterval(function() {
    // Obtiene la fecha y hora actual
    var now = new Date().getTime();

    // Calcula la diferencia entre la fecha objetivo y la fecha actual
    var distance = countDownDate - now;

    // Calcula el tiempo restante en días, horas, minutos y segundos
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Muestra el resultado en el contenedor con id="countdown"
    document.getElementById("countdown").innerHTML = days + " dias, " + hours + " horas, "
    + minutes + " minutos, " + seconds + " segundos";

    // Si el contador llega a cero, muestra un mensaje
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "Llegó el día!";
    }
}, 1000);