
function formatarData(){
    const data = document.getElementById("dataNascimento")

    data.flatpickr({
        enableTime: false,
        dateFormat:"d/m/Y",
        "locale":"pt"
    })

    const data2 = document.getElementById("dataNascimento2")

    data2.flatpickr({
        enableTime: false,
        dateFormat:"d/m/Y",
        "locale":"pt"
    })
}