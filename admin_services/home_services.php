<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
if(isset($_POST['submit'])){
    $insert = $bodyObj->insert_Services($_POST['sluzba'],$_POST['tier1'],$_POST['tier2'],$_POST['tier3']);
    if ($insert) {
        header('Location: home_services.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta";
    }

}else{
    include_once "html_menu_services.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }


    ?>
   <form action="home_services.php" method="post">
        Služba:<br>
        <input type="text" name="sluzba" placeholder="Služba" value=""><br>
        Tier 1:<br>
        x pre nie<br>
        check pre áno<br>
        <input type="text" name="tier1" placeholder="Tier 1" value=""><br>
        Tier 2<br>
        x pre nie<br>
        check pre áno<br>
        <input type="text" name="tier2" placeholder="Tier 2" value=""><br>
        Tier 3:<br>
        x pre nie<br>
        check pre áno<br>
        <input type="text" name="tier3" placeholder="Tier 3" value=""><br>
        <input type="submit" name="submit" value="Vlož"><br>
    </form>
    <?php
}

