<?php
include_once "../functions_body.php";

use main\body;

$bodyObj = new body();
$event_item = $bodyObj->getevent_item($_GET['id']);


include_once "html_menu_events.php";
?>
<form action="update_events.php" method="post">
    Deň a mesiac.:<br>
    <input type="text" name="den_mesiac" placeholder="Deň a mesiac" value="<?php echo $event_item['den_mesiac']; ?>"><br>
    Rok:<br>
    <input type="text" name="rok" placeholder="Rok" value="<?php echo $event_item['rok']; ?>"><br>
    Názov:<br>
    <input type="text" name="nazov" placeholder="Názov" value="<?php echo $event_item['nazov']; ?>"><br>
    Popis eventu:<br>
    <textarea name="info_o_evente" placeholder="Popis eventu" rows="10" ><?php echo $event_item['info_o_evente']; ?></textarea><br>
    Lokalita:<br>
    <input type="text" name="lokalita" placeholder="Lokalita" value="<?php echo $event_item['lokalita']; ?>"><br>
    Cena:<br>
    <input type="text" name="cena" placeholder="Cena" value="<?php echo $event_item['cena']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $event_item['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>
