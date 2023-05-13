<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
if (isset($_GET['id'])) {
    $delete = $bodyObj->deleteTeam_Item($_GET['id']);
    if ($delete) {
        header('Location: team_member_list.php');
    } else {
        echo "Chyba";
    }
} else {
    header('Location: team_member_list.php');
}