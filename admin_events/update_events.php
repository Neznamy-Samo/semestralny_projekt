<?php
include_once "../functions_body.php";
use main\body;
if(isset($_POST['submit'])) {
    $bodyObj = new body();
    $update = $bodyObj->updateevent_item(
        $_POST['id'],
        $_POST['den_mesiac'],
        $_POST['rok'],
        $_POST['nazov'],
        $_POST['info_o_evente'],
        $_POST['lokalita'],
        $_POST['cena']);
    if($update) {
        header('Location: event_list.php?status=2');
    } else {
        header('Location: event_list.php?status=3');
    }
}
else {
    header('Location: event_list.php');
}