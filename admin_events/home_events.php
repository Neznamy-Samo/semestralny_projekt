<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
if(isset($_POST['submit'])){
    $insert = $bodyObj->insert_events($_POST['id'],$_POST['den_mesiac'],$_POST['rok'],$_POST['nazov'],$_POST['info_o_evente'],$_POST['lokalita'],$_POST['cena']);
    if ($insert) {
        header('Location: home_events.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta";
    }

}else{
    include_once "html_menu_events.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }


    ?>
    <form action="home_events.php" method="post">
        ID:<br>
        <input type="text" name="id" placeholder="ID" value=""><br>
        Deň a mesiac:<br>
        <input type="text" name="den_mesiac" placeholder="Deň a mesiac" value=""><br>
        Rok<br>
        <input type="text" name="rok" placeholder="Rok" value=""><br>
        Názov:<br>
        <input type="text" name="nazov" placeholder="Názov" value=""><br>
        Popis eventu:<br>
        <textarea name="info_o_evente" placeholder="Popis eventu" rows="10" ></textarea><br>
        Lokalita:<br>
        <input type="text" name="lokalita" placeholder="Lokalita" value=""><br>
        Cena:<br>
        <input type="text" name="cena" placeholder="Cena" value=""><br>
        <input type="submit" name="submit" value="Vlož"><br>
    </form>
    <?php
}