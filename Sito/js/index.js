function hideElement(elem) {
    eleme.style.display = 'none';
}

function showElement(elem, mode) {
    elem.style.display = mode;
}

function showError(elem, message) {
    removeErrors(elem);
    var parent = elem.parentNode;
    var e = document.createElement('strong');
    e.className = 'errore';
    e.appendChild(document.createTextNode(message));
    parent.appendChild(e);
}

function removeErrors(elem) {
    var errori = elem.parentNode.getElementsByClassName('errore');

}