<?php
include_once "../functions_body.php";

use main\body;

$bodyObj = new body();

if (isset($_POST['submit'])) {
    $insert = $bodyObj->insertmail_item($_POST['email']);
    if ($insert) {
        header('Location: ../index.php');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
}
?>