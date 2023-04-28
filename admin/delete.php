<?php
include_once "../functions.php";
use main\body;
$bodyObj = new body();
if (isset($_GET['id'])) {
    $delete = $bodyObj->deleteTeam_Item($_GET['id']);
    if ($delete) {
        header('Location: menu.php');
    } else {
        echo "Chyba";
    }
} else {
    header('Location: menu.php');
}