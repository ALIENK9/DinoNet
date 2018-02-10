// Smooth Scrolling

$(document).ready(function(){
  $("a").on('click', function(event) {

    if (this.hash !== "") {
      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    }
  });
});

// Loading

function loading() {
    document.getElementById("loading").classList.remove("require-js"); //rende visibile l'animazione di loading
    $(document).ready(
        function() {
            $(window).load(
                function() {
                    $(".loading").fadeOut("slow");
                }
            );
        }
    );
}

function addJS() { //rende visibile il menù laterale, nasconde la barra di ricerca e mostra il pulsante per aprirla
    document.getElementById("mobile-menu-icon").setAttribute("href", "javascript:void(0)");
    document.getElementById("mobile-menu-icon").setAttribute("onclick", "open_menu()");
    document.getElementById("searchbar").classList.add("hidden");
    document.getElementById("toggle-searchbar").style.display="block";
}


// Script per aprire il menù
function open_menu() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

//Script per chiudere il menù
function close_menu() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

// Script per aprire chiudere la barra di ricerca
function toggle_searchbar() {
    var bar = document.getElementById("searchbar");
    if(bar.classList.contains("hidden"))
        bar.classList.remove("hidden");
    else
        bar.classList.add("hidden");
}

//scroll per rendere visiile pulsante toTheTop quando si scorre verso il basso
function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("toTheTop").style.display = "block";
    }
    else {
        document.getElementById("toTheTop").style.display = "none";
    }
}