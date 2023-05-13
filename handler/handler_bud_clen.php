<?php
include_once "../functions_body.php";

use main\body;

$bodyObj = new body();

if (isset($_POST['submit'])) {
    $insert = $bodyObj->insertbud_clen_item($_POST['meno_priezvisko'],$_POST['email'],$_POST['sprava']);
    if ($insert) {
        header('Location: ../index.php');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
}
?>