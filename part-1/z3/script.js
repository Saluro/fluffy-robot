function add() {
    let num = document.getElementById("cubeNum").value;

    for (let i = 0; i < num; i++) {
        let div = document.createElement('div');
        div.classList.add('draggable');
        div.textContent = "Я кубович";
        document.body.appendChild(div);
    }

    $( ".draggable" ).draggable();
}
