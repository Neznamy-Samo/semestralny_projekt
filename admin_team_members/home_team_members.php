<?php
include_once "../functions_body.php";
use main\body;
$bodyObj = new body();
if(isset($_POST['submit'])){
    $insert = $bodyObj->insertTeam_Item($_POST['id'],$_POST['meno'],$_POST['priezvisko'],$_POST['pozicia']);
    if ($insert) {
        header('Location: home_team_members.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta";
    }

}else{
    include_once "html_menu_team_members.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }


    ?>
    <form action="home_team_members.php" method="post">
        ID:<br>
        <input type="text" name="id" placeholder="ID" value=""><br>
        Meno:<br>
        <input type="text" name="meno" placeholder="Meno" value=""><br>
        Priezvisko<br>
        <input type="text" name="priezvisko" placeholder="Priezvisko" value=""><br>
        Pozícia:<br>
        <input type="text" name="pozicia" placeholder="Pozícia" value=""><br>
        <input type="submit" name="submit" value="Vlož"><br>
    </form>
    <?php
}