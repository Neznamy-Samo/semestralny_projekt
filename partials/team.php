
<?php
include_once "functions.php";
use main\body;
$bodyObj = new body();
$team_member_items = $bodyObj->getTeam_member();
$bodyObj->printTeam_member($team_member_items);

?>
