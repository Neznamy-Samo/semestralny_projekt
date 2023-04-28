<?php
include_once "../functions.php";
use main\body;
$bodyObj = new body();
$team_member_items = $bodyObj->getTeam_member();

include_once "html_menu.php";
if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Údaje úspešne aktualizované</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Údaje sa nepodarilo aktualizovať</strong><br><br>";
}

foreach ($team_member_items as $key=>$team_member_item) {
    echo "<li>ID: ". $team_member_item['id'] . ", Meno: " . $team_member_item['meno'] . ", Priezvisko: " . $team_member_item['priezvisko']. ", Pozícia: " .$team_member_item['pozicia'].
        '<a href="delete.php?id='.$team_member_item['id'].'">Vymazať</a> /
             <a href="update_form.php?id='.$team_member_item['id'].'">Aktualizovať</a>
            </li>';
}
?>