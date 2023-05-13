<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
$event_items = $bodyObj->get_events();

include_once "html_menu_events.php";
if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Údaje úspešne aktualizované</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Údaje sa nepodarilo aktualizovať</strong><br><br>";
}

foreach ($event_items as $key=>$event_item) {
    echo "<li>ID: ". $event_item['id'] . " Deň a mesiac: " . $event_item['den_mesiac'] . " Rok: " . $event_item['rok']. " Nazov: " .$event_item['nazov']."<br>Popis eventu: ".$event_item['info_o_evente']."<br>Lokalita: ".$event_item['lokalita']." Cena: ".$event_item['cena']." ".
        '<a href="delete_events.php?id='.$event_item['id'].'">Vymazať</a> /
             <a href="update_events_form.php?id='.$event_item['id'].'">Aktualizovať</a>
            </li><br>';
}
?>
