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
 *                              ############ COME FUNZIONA LA VALIDAZIONE ###############
 * Per gli elementi <input>, con attributo data-validation-mode="mode" viene chiamata la funzione di validazione
 * 'validateMode()'. In particolare:
 *      - "generico" ==> la funzione 'validateGeneric()' fa un controllo generico per <input> che non necessitano di
 *         controlli specifici, dunque guarda solo che non sia vuoto.
 *      - "password" ed input successivo diverso da name="confermapassword" ==> (Caso login), verifica che la
 *         password abbia lunghezza minima. Chiama 'validatePassword()'.
 *      - "password" e input seguente con name="confermapassword" ==> chiama la funzione 'validatePasswordConfirm()'
 *         e verifica prima che la password sia valida chiamando 'validatePassword()', e poi verifica che sia stata
 *         re-inserita correttamente nel campo di conferma.
 *      - "nomi" ==> controlla che siano stati inseriti solo caratteri alfanumerici.
 *      - "alpha" ==> controlla che siano stati inseriti solo lettere.
 *      - "email" ==> controlla con una regex che sia stato inserito un indirizzo possibilmente valido.
 *      - name="*" || attributo 'name' non presente ==> nessuna validazione.
 *
 * Per gli elementi <textarea>, dedicati all'inserimento di testi più lugnhi, quali corpo di articoli e schede si
 * chiama una unica funzione 'validateTextArea()' che nel caso sia presente l'attributo 'required', controlla che sia
 * almeno stato inserito un numero minimo di caratteri.
 */




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
 * Ritorna 'true' se il 'nomeInput.value' contiene solo carrateri tipicamente presenti in noomi o cognomi (almeno una lettera),
 * altrimenti 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}, 'true' se il testo inserito è corretto, 'false' altrimenti.
 */
function validateNomi(inputs, i) {
    var nomeInput = inputs[i];
    var inserimento = nomeInput.value;
    var pattern = /^([A-zèéìòùàç]+[\s\-']?)+$/i;
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
    var pattern = /^([A-z]+[.,;\-"'()\s]*)*$/i;
    if(pattern.test(inserimento)) {
        removeError(nomeInput);
        return true;
    }
    else {
        showError(nomeInput, 'Inserisci solo caratteri alfabetici');
        return false;
    }
}



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




/*
 * Ritorna 'true' se il 'nomeInput.value' contiene almeno 1 carattere, altrimenti 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}, 'true' se è stato inserito qualcosa, 'false' altrimenti.
 *
function validateRequired(inputs, i) {
    var nomeInput = inputs[i];
    if(nomeInput.value === undefined || nomeInput.value.length < 1) {
        showError(nomeInput, 'Inserisci almeno un carattere');
        return false;
    }
    removeError(nomeInput);
    return true;
}*/




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
    var pattern = /'^[0-9]+$'/;
    if (!pattern.test(min.value)) {
        showError(min, 'Questo formato non è valido');
        return false;
    }
    if(min.value > 350) {
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
    var pattern = /'^[0-9]+$'/;
    if (!pattern.test(max.value)) {
        showError(max, 'Questo formato non è valido');
        return false;
    }
    if(max.value < 60) {
        showError(max, 'I dinosauri si sono estinti circa 65 milioni di anni fa!');
        return false;
    }

    if(i > 0 && 'periodomin' === inputs[i - 1].getAttribute('data-validation-mode')) {
        var min = inputs[i - 1];
        if(min.value < max.value) {
            showError(max, 'Il periodo minimo non può essere maggiore del periodo massimo. Per esempio: da min=260 (milioni di anni fa) a max=100 (milioni)');
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
    /*var richiesto = nomeInput.hasAttribute('required');
    if(richiesto && (dataStringa === undefined || dataStringa.length === 0)) {
        showError(nomeInput, 'Devi inserire una data');
        return false;
    }
    if(!richiesto && (dataStringa === undefined || dataStringa.length === 0))
        return true;*/

    //console.info('Stringa: ' + dataStringa);
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
 * Controlla che l'input con tipo type="file" sia stato caricato un file.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateFilereq(inputs, i) {
    var nomeInput = inputs[i];
    if(nomeInput.getAttribute('type') === 'file' && nomeInput.files.length === 0) {
        showError(nomeInput, 'Deve essere selezionato un file');
        return false;
    }
    removeError(nomeInput);
    return true;
}




/**
 * Ritorna 'true' se:
 *      - è stata inserita una immagine con la descrizione;
 *      - non è stata inserita una immagine, indipendentemente dalla presenza della descrizione.
 *      Altrimenti segnala l'errore e ritorna 'false'.
 * @param inputs
 * @param i
 * @returns {boolean}
 */
function validateDescrizioneimg(inputs, i) {
    var alt = inputs[i];
    var presenzaImmagine = (i+1) < inputs.length && inputs[i + 1].getAttribute('type') === 'file' &&
        inputs[i + 1].files.length > 0 && 'immaginearticolo' === inputs[i + 1].getAttribute('data-validation-mode');
    var descrizioneVuota = alt.value === undefined || alt.value.length === 0;
    if(presenzaImmagine && descrizioneVuota) {
        showError(alt, 'È necessaria una descrizione alternativa per l\'immagine');
        return false;
    }
    removeError(alt);
    return true;
}






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
        else if (mode !== undefined && mode != null) {
            var functionName = 'validate' + mode;
            var fn = window[functionName];            // nome della funzione da chiamare per validare
            if (typeof fn === 'function')             // se esiste una funzione con quel nome
            corretto = corretto && fn(inputs, i);     // chiama la funzione con nome 'functionName'
        }                                                                   // dandole la lista di <input> e l'indice corrente
    }

    for (var j = 0; j < texts.length; j++)  // una funzione apposita controlla le textarea
        corretto = corretto && validateTextArea(texts, j);

    return corretto;
}





/**
 * Aggiunge al parent element di 'elem' un elemento <strong> con il messaggio indicato in 'message'.
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


/*##########################################      DISABILITA INPUT     ############################################*/

function disableInputImmagine() {
    var inputArti = document.getElementById('imgarticleremove');
    var inputDino = document.getElementById('imgdinosaurremove');
    if(inputArti) {
        inputArti.addEventListener('change', function () {
            if (inputArti.value === true) {
                document.getElementById('imgarticle').disabled = true;
                document.getElementById('descrizioneimg').disabled = true;
            }
            else {
                document.getElementById('imgarticle').disabled = false;
                document.getElementById('descrizioneimg').disabled = false;
            }
        })
    }
    else if(inputDino) {
        inputDino.addEventListener('change', function () {
            if(inputDino.value === true)
                document.getElementById('imgdinosaur').disabled = true;
            else
                document.getElementById('imgdinosaur').disabled = false;
        })
    }
}