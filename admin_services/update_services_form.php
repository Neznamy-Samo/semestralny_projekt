<?php
include_once "../functions_body.php";

use main\body;

$bodyObj = new body();
$service_item = $bodyObj->getService_item($_GET['id']);


include_once "html_menu_services.php";
?>
<form action="update_services.php" method="post">
    Služba:<br>
    <input type="text" name="sluzba" placeholder="Služba" value="<?php echo $service_item['sluzba']; ?>"><br>
    Tier 1:<br>
    x pre nie<br>
    check pre áno<br>
    <input type="text" name="tier1" placeholder="Tier1" value="<?php echo $service_item['tier1']; ?>"><br>
    Tier 2:<br>
    x pre nie<br>
    check pre áno<br>
    <input type="text" name="tier2" placeholder="Tier2" value="<?php echo $service_item['tier2']; ?>"><br>
    Tier 3:<br>
    x pre nie<br>
    check pre áno<br>
    <input type="text" name="tier3" placeholder="Tier3" value="<?php echo $service_item['tier3']; ?>"><br>

    <input type="hidden" name="id" value="<?php echo $service_item['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>