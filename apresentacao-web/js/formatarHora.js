
function formatarHora(){
    const data = document.getElementById("dataNascimento")

    data.flatpickr({
        enableTime: false,
        dateFormat:"d/m/Y",
    })
}