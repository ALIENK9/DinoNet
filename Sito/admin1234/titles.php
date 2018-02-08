<?php

/**
 * Stampa su $echoString il titolo per ogni pagina amministratore
 * @return string
 */
function printTitleAdmin($idPage, $sezione) {
    if(!isset($idPage) || $idPage=="") $idPage = "home";
    if(!isset($sezione) || $sezione=="") $sezione = "list";
    switch ($idPage) {
        case 'home':
            $echoString = "Home &#124; Dino Net";
            break;

        case 'user':
            switch ($sezione) {
                case 'list':
                $echoString = "Elenco utenti &#124; Dino Net";
                break;
                case 'formadd':
                    $echoString = "Aggiunti utente &#124; Dino Net";
                    break;
                case 'add':
                    $echoString = "Aggiunti utente &#124; Dino Net";
                    break;
                case 'formupdate':
                    $echoString = "Modifica utente &#124; Dino Net";
                    break;
                case 'update':
                    $echoString = "Modifica utente &#124; Dino Net";
                    break;
                case 'delete':
                    $echoString = "Elimina utente &#124; Dino Net";
                    break;
                default:
                    $echoString = "Area utenti &#124; Dino Net";
                break;
            }
            break;

        case 'myuser':
            $echoString = "Modifica profilo &#124; Dino Net";
            break;

        case 'dino':
            switch ($sezione) {
                case 'list':
                    $echoString = "Elenco dinosauri &#124; Dino Net";
                    break;
                case 'formadd':
                    $echoString = "Aggiunti dinosauro &#124; Dino Net";
                    break;
                case 'add':
                    $echoString = "Aggiunti dinosauro &#124; Dino Net";
                    break;
                case 'formupdate':
                    $echoString = "Modifica dinosauro &#124; Dino Net";
                    break;
                case 'update':
                    $echoString = "Modifica dinosauro &#124; Dino Net";
                    break;
                case 'delete':
                    $echoString = "Elimina dinosauro &#124; Dino Net";
                    break;
                case 'comment':
                    $echoString = "Elenco commenti dinosauro &#124; Dino Net";
                    break;
                case 'deletecomment':
                    $echoString = "Elimina commenti dinosauro &#124; Dino Net";
                    break;
                default:
                    $echoString = "Area dinosauri &#124; Dino Net";
                    break;
            }
            break;

        case 'article':
            switch ($sezione) {
                case 'list':
                    $echoString = "Elenco articoli &#124; Dino Net";
                    break;
                case 'formadd':
                    $echoString = "Aggiunti articolo &#124; Dino Net";
                    break;
                case 'add':
                    $echoString = "Aggiunti articolo &#124; Dino Net";
                    break;
                case 'formupdate':
                    $echoString = "Modifica articolo &#124; Dino Net";
                    break;
                case 'update':
                    $echoString = "Modifica articolo &#124; Dino Net";
                    break;
                case 'delete':
                    $echoString = "Elimina articolo &#124; Dino Net";
                    break;
                case 'comment':
                    $echoString = "Elenco commenti articolo &#124; Dino Net";
                    break;
                case 'deletecomment':
                    $echoString = "Elimina commenti articolo &#124; Dino Net";
                    break;
                default:
                    $echoString = "Area articoli &#124; Dino Net";
                    break;
            }
            break;

        case 'search':
                $echoString = "Ricerca &#124; Dino Net";
            break;

        default:
            $echoString = "Pannello amministratore &#124; Dino Net";
            break;
        }
        return $echoString;
}

?>