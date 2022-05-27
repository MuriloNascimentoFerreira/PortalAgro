const fields = document.querySelectorAll("[required]")

for(const field of fields){
    field.addEventListener("invalid", event => {
        field.style = 'box-shadow: 0 0 0 0.2rem rgb(255, 0, 0, 0.404);'+
        'border-color: red'
        })

    field.addEventListener("input", function(event){
        field.style = 'box-shadow: 0 0 0 0.2rem rgb(63, 237, 63, 0.404);'+
        'border-color: rgb(63, 237, 63, 0.695)'
    })

}
// validar as duas senhas






