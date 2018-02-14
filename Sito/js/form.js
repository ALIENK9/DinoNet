
/*##########################################      VALIDAZIONE DEI FORM     ############################################*/


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
 * Ritorna true se il campo input non ha l'attributo required e non è stato compilato.
 * @param input
 * @returns {boolean}
 */
function isOpzionaleVuoto(input) {
    return !input.hasAttribute('required') && (input.value === undefined || input.value.length === 0);
}





/**
 *                              ############ COME FUNZIONA LA VALIDAZIONE ###############
 * Per gli elementi <input>, con attributo data-validation-mode="mode" viene chiamata la funzione di validazione
 * 'validateMode()'. In particolare:
 *      - "password" ed input successivo diverso da name="confermapassword" ==> (Caso login), verifica che la
 *         password abbia lunghezza minima. Chiama 'validatePassword()'.
 *      - "password" e input seguente con "confermapassword" ==> verifica prima che la password sia valida,
 *         e poi verifica che sia stata re-inserita correttamente nel campo di conferma.
 *      - "nomi" ==> controlla che siano stati inseriti solo caratteri alfabetici e lettere accentate.
 *      - "alpha" ==> controlla che siano stati inseriti solo lettere e segni di punteggiatura e parentesi.
 *      - "email" ==> controlla con una regex che sia stato inserito un indirizzo possibilmente valido.
 *      - "unsigned" ==> controlla che siano inseriti solamente numeri interi positivi.
 *      - "image" ==> controlla che l'immagine caricata abbia il formato appropriato.
 *      - "periodomin" e "periodomax" ==> controlla che i campi siano coerenti fra loro e contengano periodi sensati.
 *      - "datanascita" ==> controlla che la data di nascita dell'utente sia valida.
 *      - data-validation-mode="" || attributo non presente ==> nessuna validazione.
 *
 * Per gli elementi <textarea>, dedicati all'inserimento di testi più lunghi, quali corpo di articoli e schede si
 * chiama una unica funzione 'validateTextArea()' che nel caso sia presente l'attributo 'required', controlla che sia
 * almeno stato inserito un numero minimo di caratteri.
 */





/**
 * Valida tutti i campi input del form, chiamando funzioni di validazione per ciascun tag 'input'.
 * @param nomeForm, il form da validare.
 * @returns {boolean}, 'true' se tutti campi del form sono stati compilati correttamente, 'false' altrimenti.
 */
function validateForm(nomeForm) {
    var corretto = true;
    var inputs = nomeForm.getElementsByTagName('input');
    var texts = nomeForm.getElementsByTagName('textarea');

    for (var i = 0; i < inputs.length; i++) {
        var mode = capitalizeFirstLetter(inputs[i].getAttribute('data-validation-mode'));
        if(inputs[i].hasAttribute('required') && (inputs[i].value === undefined || inputs[i].value.length === 0)) {
            showError(inputs[i], 'Il campo non può essere vuoto!');
            corretto = false;
        }
        else if (!isOpzionaleVuoto(inputs[i]) && mode !== null && mode !== undefined) {
            var functionName = 'validate' + mode;
            var fn = window[functionName];            // nome della funzione da chiamare per validare
            if (typeof fn === 'function')             // se esiste una funzione con quel nome
                corretto = corretto && fn(inputs, i);     // chiama la funzione con nome 'functionName'
        }                                                  // dandole la lista di <input> e l'indice corrente
    }

    for (var j = 0; j < texts.length; j++)           // una funzione apposita controlla le textarea
        corretto = corretto && validateTextArea(texts, j);
    return corretto;
}




/**
 * Controlla che la <textarea> abbia un numero minimo di caratteri.
 * @param texts
 * @param i
 * @returns {boolean}
 */
function validateTextArea(texts, i) {
    var textArea = texts[i];
    if(textArea.hasAttribute('required') && (textArea.value === undefined || textArea.value.length < 1)) {
        showError(textArea, 'Il campo non può essere vuoto');
        return false;
    }
    removeError(textArea);
    return true;
}




/**
 * Ritorna 'true' se il 'nomeInput.value' contiene solo carrateri tipicamente presenti in nomi o cognomi (almeno una lettera),
 * altrimenti 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}, 'true' se il testo inserito è corretto, 'false' altrimenti.
 */
function validateNomi(inputs, i) {
    var nomeInput = inputs[i];
    var inserimento = nomeInput.value;
    var pattern = /^([A-zèéìòùàç]+[\s\-']?)*$/i;
    if(pattern.test(inserimento)) {
        removeError(nomeInput);
        return true;
    }
    showError(nomeInput, 'Formato non corretto: puoi inserire caratteri alfabetici anche accentati,' +
        ' con trattini, apostrofi e spazi, ma non doppi');
    return false;
}




/**
 * Ritorna 'true' se il 'nomeInput.value' contiene solo carrateri alfabetici (almeno una lettera) e/o segni di punteggiatura,
 * altrimenti 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}, 'true' se il testo inserito è corretto, 'false' altrimenti.
 */
function validateAlpha(inputs, i) {
    var nomeInput = inputs[i];
    var inserimento = nomeInput.value;
    var pattern = /^([A-zèéìòùàç]+[.,;\-"'()\s]*)*$/i;
    if(pattern.test(inserimento)) {
        removeError(nomeInput);
        return true;
    }
    else {
        showError(nomeInput, 'Inserisci solo caratteri alfabetici');
        return false;
    }
}




/**
 * Ritorna 'true' se l'input contiene solo numeri senza segno
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateUnsigned(inputs, i) {
    var nomeInput = inputs[i];
    var numero = nomeInput.value;
    var pattern = /^[0-9]*$/;
    if(!pattern.test(numero)) {
        showError(nomeInput, 'Inserire un decimale positivo');
        return false;
    }
    removeError(nomeInput);
    return true;
}




/**
 * Ritorna 'true' se la password è di almeno 4 caratteri, altrimenti 'false'.
 * Se nell'input seguente viene chiesto di reinserirla per conferma ritorna 'true' solo se le due passowrd coincidono.
 * @param inputs,  NodeList di elementi <input> del form
 * @param i, indice dell'input con il campo 'password' nella lista 'inputs'
 * @returns {boolean}
 */
function validatePassword(inputs, i) {
    var inputPassword = inputs[i];
    removeError(inputPassword);
    if(inputPassword.value === undefined || inputPassword.value.length < 4) {
        showError(inputPassword, 'La password non può avere meno di 4 caratteri');
        return false;
    }

    if((i+1) < inputs.length && inputs[i + 1].getAttribute('data-validation-mode') === 'confermapassword') {
        var confermaPassword = inputs[i + 1];
        if(inputPassword.value !== confermaPassword.value) {
            showError(confermaPassword, 'Le due password non corrispondono');
            return false;
        }
    }
    removeError(inputPassword);
    return true;
}




/**
 * Ritorna 'true' se 'inputs.value' è un indirizzo email corretto, altrimenti ritorna 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateEmail(inputs, i) {
    var nomeInput = inputs[i];
    var email = nomeInput.value;
    var pattern = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    if(pattern.test(email)) {   //email undefined ==> ritorna false
        removeError(nomeInput);
        return true;
    }
    else {
        showError(nomeInput, 'L\'indirizzo email non è valido');
        return false;
    }
}




/**
 * Controlla che i dati inseriti circa il periodo DAL QUALE una specie visse sia nel formato corretto e sia sensato.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validatePeriodomin(inputs, i) {
    var min = inputs[i];
    var pattern = /^[0-9]*$/;
    if (!pattern.test(min.value)) {
        showError(min, 'Questo formato non è valido: puoi inserire solamente numeri interi');
        return false;
    }
    var permin = parseInt(min.value, 10);
    if(permin > 350) {
        showError(min, 'Non c\'erano dinosauri prima di 350 milioni di anni fa!');
        return false;
    }
    return true;
}




/**
 * Controlla che il periodo FINO AL QUALE una specie visse sia nel formato corretto e sensato. Se lo è e nell'<input> precedente
 * veniva richiesto il periodo minimo allora controlla anche che i due periodi siano coerenti fra di loro.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validatePeriodomax(inputs, i) {
    var max = inputs[i];
    var pattern = /^[0-9]*$/;
    if (!pattern.test(max.value)) {
        showError(max, 'Questo formato non è valido: puoi inserire solamente numeri interi');
        return false;
    }
    var permax = parseInt(max.value, 10);
    if(permax < 60) {
        showError(max, 'I dinosauri si sono estinti circa 65 milioni di anni fa!');
        return false;
    }

    if(i > 0 && 'periodomin' === inputs[i - 1].getAttribute('data-validation-mode')) {
        var min = inputs[i - 1];
        var permin = parseInt(min.value, 10);
        if(permin < permax) {
            console.log("Periodo min = " + permin + " < Periodo max = " + permax);
            showError(max, 'Errore: il periodo minimo deve essere maggiore del periodo massimo. Per esempio: da min=260 (milioni di anni fa) a max=100 (milioni)');
            return false;
        }
    }
    removeError(max);
    return true;
}




/**
 * Valida la data di nascita inserita dall'utente nel formato gg/mm/aaaa, solo se presente o se non presente
 * quando richiesta.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateDatanascita(inputs, i) { //  Formato:   gg/mm/aaaa
    var nomeInput = inputs[i];
    var dataStringa = nomeInput.value;
    var splitted = dataStringa.split('-');
    var a = parseInt(splitted[0], 10);
    var m = parseInt(splitted[1], 10);
    var g = parseInt(splitted[2], 10);

    if(g === 0 || g > 31 || m === 0 || m > 12 || a < 1900) {
        showError(nomeInput, 'La data non è valida');
        return false;
    }
    removeError(nomeInput);
    return true;
}




/**
 * Controlla che nell'input con tipo type="file" sia stato caricato una immagine valida.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateImage(inputs, i) {
    var ok = true;
    var nomeInput = inputs[i];
    if(nomeInput.getAttribute('type') === 'file' && nomeInput.files.length !== 0) { //se c'è un'immagine
        var ext = nomeInput.value.split('.').pop();                                 //controlla sia nel formato valido
        if(ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'gif') {
            console.log('Formato non valido');
            showError(nomeInput, 'Questa immagine non ha un estensione valida: sono consentiti solo jpg, jpeg, png e gif');
            ok = false;
        }
        else
            removeError(nomeInput);

        console.log('Formato valido');
                                                                                //deve esserci anche una descrizione alt
        var alt = (i > 0 && 'descrizioneimg' === inputs[i - 1].getAttribute('data-validation-mode')) ? inputs[i - 1] : null;
        if(alt !== null) {
            console.log('descrizioneimg trovata');
            var descrizioneVuota = alt.value === undefined || alt.value.length === 0;
            var pattern = /^([A-zèéìòùàç\d]+[.,;\-"'()\s]*)*$/i;
            if(descrizioneVuota) {
                showError(alt, 'Errore: è necessaria una descrizione alternativa per l\'immagine')
                ok = false;
            }
            else if(!pattern.test(alt.value)) {
                showError(alt, 'Formato non valido: puoi inserire lettere, numeri e [.,;-=\'()]');
                ok = false;
            }
            else
                removeError(alt);
        }
        console.log('Fine funzione');
    }
    console.log('end');
    return ok;
}





/**
 * Aggiunge al parent element di 'elem' un elemento <strong> con il messaggio indicato in 'message'.
 * @param elem
 * @param message
 */
function showError(elem, message) {
    console.log('showerrror');
    removeError(elem);
    console.log('showerrror2');
    var parent = elem.parentNode;
    var e = document.createElement('strong');
    e.className = 'errore';
    e.appendChild(document.createTextNode(message));
    parent.appendChild(e);
    console.log('showerrrorend');
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



/*##########################################      DISABILITA INPUT     ############################################*/
/**
 * Aggiunge un eventListener sul checkbox per rimuovere le immagini. La funzione è disabilitare/abilitare l'input di
 * upload di una immagine nel caso si selezioni/deselezioni la casella 'nessuna immagine'.
 */
function disableInputImmagine() {
    var inputArti = document.getElementById('imgarticleremove');
    var inputDino = document.getElementById('imgdinosaurremove');
    var inputUser = document.getElementById('imgaccountremove');
    if(inputArti !== null) {
        inputArti.addEventListener('change', function () {
            if (inputArti.checked === true) {
                var img = document.getElementById('imgarticle');
                img.setAttribute('disabled', 'disabled');
                img.value = '';
                document.getElementById('descrizioneimg').setAttribute('disabled', 'disabled');
            }
            else {
                document.getElementById('imgarticle').removeAttribute('disabled');
                document.getElementById('descrizioneimg').removeAttribute('disabled');
            }
        })
    }
    else if(inputDino !== null) {
        inputDino.addEventListener('change', function () {
            if(inputDino.checked === true)
                document.getElementById('imgdinosaur').setAttribute('disabled', 'disabled');
            else
                document.getElementById('imgdinosaur').removeAttribute('disabled');
        })
    }
    else if(inputUser !== null) {
        inputUser.addEventListener('change', function () {
            if (inputUser.checked === true)
                document.getElementById('imgaccount').setAttribute('disabled', 'disabled');
            else
                document.getElementById('imgaccount').removeAttribute('disabled');
        })
    }
}