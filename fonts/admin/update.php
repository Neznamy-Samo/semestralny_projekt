<?php
include_once "../functions.php";
use main\body;
if(isset($_POST['submit'])) {
    $bodyObj = new body();
    $update = $bodyObj->updateteam_member_item(
        $_POST['id'],
        $_POST['meno'],
        $_POST['priezvisko'],
        $_POST['pozicia']);
    if($update) {
        header('Location: team_member_list.php?status=2');
    } else {
        header('Location: team_member_list.php?status=3');
    }
}
else {
    header('Location: team_member_list.php');
}