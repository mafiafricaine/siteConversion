<?php
//cette fonction retourne si on est connecté
function is_connected(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //retournera vrai si notre variable n'est pas vide
    return !empty($_SESSION['connected']);
}
