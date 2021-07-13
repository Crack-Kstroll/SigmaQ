// Clase para el control de eventos dentro de las paginas web

// Colocamos en una constante los input a los que queremos aplicar el efecto
const inputs = document.querySelectorAll('.input');

// Al deseleccionar un input el placeholder cambiara de lugar
function focusFunc(){
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

// Al deseleccionar un input el placeholder cambiara de lugar
function blurFunc(){
    let parent = this.parentNode.parentNode;
    if(this.value== "") {
        parent.classList.remove('focus');
    }

}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
})
