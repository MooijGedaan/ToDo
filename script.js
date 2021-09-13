function wegstrepen(elem) {

    const text = elem.querySelector('.textToDo');
    const rondje = elem.querySelector('.rondje');
    const bevestigingRondje = rondje.querySelector('.bevestiging');

    const textInhoud = text.innerHTML;
    text.innerHTML = "<del>" + textInhoud + "</del>";

    rondje.style.border = " 1.5px solid";
    rondje.style.borderColor = "rgb(56, 163, 56)";

    bevestigingRondje.style.display = "block";



}