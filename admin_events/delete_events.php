<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
if (isset($_GET['id'])) {
    $delete = $bodyObj->delete_event_item($_GET['id']);
    if ($delete) {
        header('Location: event_list.php');
    } else {
        echo "Chyba";
    }
} else {
    header('Location: event_list.php');
}