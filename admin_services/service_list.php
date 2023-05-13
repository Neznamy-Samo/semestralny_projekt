<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
$service_items = $bodyObj->getServices();

include_once "html_menu_services.php";
if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Údaje úspešne aktualizované</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Údaje sa nepodarilo aktualizovať</strong><br><br>";
}

foreach ($service_items as $key=>$service_item) {
    echo "<li>ID: ". $service_item['id'] . " Služba: " . $service_item['sluzba'] . "  Tier 1: " . $service_item['tier1']. " Tier 2: " .$service_item['tier2']." Tier 3: ".$service_item['tier3']." ".
        '<a href="delete_services.php?id='.$service_item['id'].'">Vymazať</a> /
             <a href="update_services_form.php?id='.$service_item['id'].'">Aktualizovať</a>
            </li><br>';
}
?>
