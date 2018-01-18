function hideElement(elem) {
    elem.style.display = 'none';
}

function showElement(elem, mode) {
    elem.style.display = mode;
}




/**
 * Trasforma in maiuscolo la prima lettera della stringa.
 * @param stringa.
 * @returns {string, null}, la stringa originale con l'iniziale maiuscola, oppure 'null' se era 'null'.
 */
function capitalizeFirstLetter(stringa) {
    if(stringa === null)
        return null;
    return stringa.charAt(0).toUpperCase() + stringa.slice(1);
}




/**
 * Valida tutti i campi input del form, chiamando funzioni di validazione per ciascun tag 'input'.
 * @param nomeForm, il form da validare.
 * @returns {boolean}, 'true' se tuttii campi del form sono stati compilati correttamente, 'false' altrimenti.
 */
function validateForm(nomeForm) {
    var corretto = true;
    var result = false;
    var inputs = nomeForm.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
        var temp = capitalizeFirstLetter(inputs[i].getAttribute('name'));
        if (temp !== null && temp !== 'Confermapassword') {
            if(temp === 'Password' && (i+1) < inputs.length && inputs[i+1].getAttribute('name') === 'confermapassword')
                result = validatePasswordConfirm(inputs[i], inputs[i + 1]);         //se il campo password è seguito da conferma password
            else {
                var functionName = 'validate' + temp;                             //formato per chiamare le funzioni
                result = window[functionName](inputs[i]);                         //chiama la funzione con nome 'functionName' con il suo input per controllarli
            }
            corretto = corretto && result;
        }
    }
    return corretto;
}




/**
 * Valida il campo nome del'utente.
 * @param nomeInput, l'elemento 'input' da validare.
 * @returns {boolean}, 'true' se il testo inserito è corretto, 'false' altrimenti.
 */
function validateNome(nomeInput) {
    var inserimento = nomeInput.value;
    var pattern = new RegExp('^[A-z0-9]+$');
    if(pattern.test(inserimento)) {
        removeError(nomeInput);
        return true;
    }
    else {
        showError(nomeInput, 'Solo caratteri alfanumerici');
        return false;
    }
}




/**
 * Valida il campo cognome.
 * @param nomeInput, l'elemento 'input' da validare.
 * @returns {boolean}, 'true' se il testo inserito è corretto, 'false' altrimenti.
 */
function validateCognome(nomeInput) {
    return validateNome(nomeInput);
}




/**
 * Ritorna 'true' se la password è di almeno 4 caratteri e coincide con quella inserita nel campo di conferma password,
 * 'false', altrimenti.
 * @param inputPassword, campo con la password inserita.
 * @param confermaPassword
 * @returns {boolean}, 'true' se lunghezza >= minima e le password corrispondono, altrimenti 'false'.
 */
function validatePasswordConfirm(inputPassword, confermaPassword) {// lunghezza minima psw
    var minlength = 4;
    var corretto = true;
    removeError(inputPassword);
    removeError(confermaPassword);

    if(inputPassword.value.length < minlength) {
        showError(inputPassword, 'La password deve contenere almeno ' + minlength + ' caratteri');
        corretto = false;
    }
    if(inputPassword.value !== confermaPassword.value) {
        showError(confermaPassword, 'Le due password non corrispondono');
        corretto = false;
    }
    return corretto;
}




/**
 * Ritorna 'true' se nomeInput.value è un indirizzo email corretto, altrimenti ritorna 'false'.
 * @param nomeInput.
 * @returns {boolean}
 */
function validateEmail(nomeInput) {
    var email = nomeInput.value;
    var pattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    if(pattern.test(email)) {
        removeError(nomeInput);
        return true;
    }
    else {
        showError(nomeInput, 'L\'indirizzo email non è valido');
        return false;
    }
}




/**
 * Controlla se l'input è vuoto o meno.
 * @param nomeInput
 * @returns {boolean}
 */
function validatePassword(nomeInput) {
    removeError(nomeInput);
    if(nomeInput.value === undefined || nomeInput.value.length === 0) {
        showError(nomeInput, 'Il campo è vuoto');
        return false;
    }
    return true;
}




/**
 * Aggiunge al parent element di 'elem' un paragrafo con il messaggio indicato in 'message'.
 * @param elem
 * @param message
 */
function showError(elem, message) {
    removeError(elem);
    var parent = elem.parentNode;
    var e = document.createElement('strong');
    e.className = 'errore';
    e.appendChild(document.createTextNode(message));
    parent.appendChild(e);
}




/**
 * Rimuove l'elemento di classe 'errore' figlio del parent di elem. Ci può essere al più un errore per elem.
 * @param elem
 */
function removeError(elem) {
    var parent = elem.parentNode;
    var errore = parent.getElementsByClassName('errore');
    if(errore.length > 0)
        parent.removeChild(errore[0]);
}