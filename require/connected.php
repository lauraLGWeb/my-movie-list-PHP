<?php
// Message de connexion
if (isset($_SESSION["connecte"]) && $_SESSION["connecte"]) {
    echo '<p class="connexionMsgYes">Vous êtes connectée</p>';
} else {
    echo '<p class="connexionMsgNo">Vous n\'êtes pas connectée</p>';
}
?>