<?php

namespace main;


use \PDO;
class body
{
    private string $hostname = "localhost";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "sj2023";

    private $connection;
    public function __construct(string $host = "", int $port = 3306, string $user = "", string $pass = "", string $dbName = ""){

        if (!empty($host)) {
            $this->hostname = $host;
        }
        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($user)) {
            $this->username = $user;
        }

        if (!empty($pass)) {
            $this->password = $pass;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }
        try {
            $this->connection = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbName.";charset=utf8mb4;port=".$this->port, $this->username, $this->password);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }


public function getTeam_member():array{

        try{
            $sql = "SELECT * FROM team_member";
            $query  = $this->connection->query($sql);
            $team_member_items = $query->fetchAll(PDO::FETCH_ASSOC);



        } catch(\Exception $exception){
           $team_member_items=[0=>['id'=>1,'meno'=>'Michal','priezvisko'=>'Novotný','pozicia'=>'Generálny riaditeľ']
               ,1=>['id'=>2,'meno'=>'Natália','priezvisko'=>'Martinská','pozicia'=>'Spoluzakladateľka']];
        }

return $team_member_items;
}

    public function printTeam_member(array $team_member_items){
        foreach ($team_member_items as $key =>$item){
            echo '<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
    <div class="member-block">
        <div class="member-block-image-wrap">
            <img src="images/members/member'.$item['id'].'.jpg" class="member-block-image img-fluid" alt="">
        </div>
        <div class="member-block-info d-flex align-items-center">
            <h4>'.$item['meno']." ".$item['priezvisko'].' </h4>
            <p class="ms-auto">'.$item['pozicia'].'</p>
        </div>
    </div>
</div>';
        }
    }

}
