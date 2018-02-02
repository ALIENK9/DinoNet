
/*##########################################      DISABILITA INPUT     ############################################*/

function disableInputImmagine() {
    var inputArti = document.getElementById('imgarticleremove');
    var inputDino = document.getElementById('imgdinosaurremove');
    console.log("Ascoltsdasadas");
    if(inputArti) {
        inputArti.addEventListener('change', function () {
            if (inputArti.value === true) {
                console.log("Ascoltato pulsante article checked");
                document.getElementById('imgarticle').disabled = true;
                document.getElementById('descrizioneimg').disabled = true;
            }
            else {
                console.log("Ascoltato pulsante article unchecked");
                document.getElementById('imgarticle').disabled = false;
                document.getElementById('descrizioneimg').disabled = false;
            }
        })
    }
    else if(inputDino) {
        inputDino.addEventListener('change', function () {
            if(inputDino.value === true) {
                console.log("Ascoltato pulsante dino unchecked");
                document.getElementById('imgdinosaur').disabled = true;
                console.log("Disab immagine dino unchecked");
            }
            else
                document.getElementById('imgdinosaur').disabled = false;
        })
    }
}