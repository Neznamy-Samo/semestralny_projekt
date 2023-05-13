<?php
include_once "../functions_body.php";

use main\body;

$bodyObj = new body();
$team_member_item = $bodyObj->getteam_member_item($_GET['id']);


include_once "html_menu_team_members.php";
?>
<form action="update_team_members.php" method="post">
    Meno:<br>
    <input type="text" name="meno" placeholder="Meno" value="<?php echo $team_member_item['meno']; ?>"><br>
    Priezvisko:<br>
    <input type="text" name="priezvisko" placeholder="Priezvisko" value="<?php echo $team_member_item['priezvisko']; ?>"><br>
    Pozícia:<br>
    <input type="text" name="pozicia" placeholder="Pozícia" value="<?php echo $team_member_item['pozicia']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $team_member_item['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>
