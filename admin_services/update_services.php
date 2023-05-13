<?php
include_once "../functions_body.php";
use main\body;
if(isset($_POST['submit'])) {
    $bodyObj = new body();
    $update = $bodyObj->updateservice_item(
        $_POST['id'],
        $_POST['sluzba'],
        $_POST['tier1'],
        $_POST['tier2'],
        $_POST['tier3']);
    if($update) {
        header('Location: service_list.php?status=2');
    } else {
        header('Location: service_list.php?status=3');
    }
}
else {
    header('Location: service_list.php');
}