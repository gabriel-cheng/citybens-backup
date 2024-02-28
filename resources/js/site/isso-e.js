let li = document.querySelectorAll('.container-isso-e li');
let span = document.createElement('span');
let text = document.createTextNode("Isso é citybens");
span.classList.add('citybens-paragraph');
span.appendChild(text);

function callbackLi(event) {
    li.forEach((li) => {
        li.classList.remove('background');
    })

    var currentTargetP = event.currentTarget.querySelector('p');

    currentTargetP.after(span)

    event.currentTarget.classList.add('background');
}

li.forEach((li) => {
    li.addEventListener('mouseenter', callbackLi);
})
