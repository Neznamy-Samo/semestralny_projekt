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

    public function __construct(string $host = "", int $port = 3306, string $user = "", string $pass = "", string $dbName = "")
    {

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
            $this->connection = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->dbName . ";charset=utf8mb4;port=" . $this->port, $this->username, $this->password);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }


    public function getTeam_member(): array
    {

        try {
            $sql = "SELECT * FROM team_member";
            $query = $this->connection->query($sql);
            $team_member_items = $query->fetchAll(PDO::FETCH_ASSOC);


        } catch (\Exception $exception) {
            $team_member_items = [0 => ['id' => 1, 'meno' => 'Michal', 'priezvisko' => 'Novotný', 'pozicia' => 'Generálny riaditeľ']
                , 1 => ['id' => 2, 'meno' => 'Natália', 'priezvisko' => 'Martinská', 'pozicia' => 'Spoluzakladateľka']];
        }

        return $team_member_items;
    }

    public function printTeam_member(array $team_member_items)
    {
        foreach ($team_member_items as $key => $item) {
            echo '<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0"> 
    <div class="member-block">
        <div class="member-block-image-wrap">
            <img src="images/teams/member' . $item['id'] . '.jpg" class="member-block-image img-fluid" alt="">
        </div>
        <div class="member-block-info d-flex align-items-center">
            <h4>' . $item['meno'] . " " . $item['priezvisko'] . ' </h4>
            <p class="ms-auto">' . $item['pozicia'] . '</p>
        </div>
    </div>
</div>';
        }
    }

    public function insertTeam_Item(int $id, string $meno, string $priezvisko, string $pozicia): bool
    {
        $insert = false;
        $sql = "INSERT INTO team_member(id,meno,priezvisko,pozicia) VALUES ('" . $id . "','" . $meno . "','" . $priezvisko . "','" . $pozicia . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

    public function deleteTeam_Item(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM team_member WHERE id = " . $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné odstrániť. Chyba: " . $exception->getMessage();
        }

        return $delete;
    }


    public function getteam_member_item(int $id): array
    {
        {
            try {
                $sql = "SELECT * FROM team_member WHERE id = " . $id;
                $query = $this->connection->query($sql);
                $data = $query->fetch(\PDO::FETCH_ASSOC);


            } catch (\Exception $exception) {
                echo "Chyba: " . $exception->getMessage();
            }

            return $data;

        }
    }

    public function updateteam_member_item(int $id, string $meno, string $priezvisko, string $pozicia): bool
    {
        try {
            $sql = "UPDATE team_member SET meno = :meno, priezvisko = :priezvisko, pozicia = :pozicia WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'meno' => $meno,
                'priezvisko' => $priezvisko,
                'pozicia' => $pozicia,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;

        }
        return $update;
    }


#eventy
public function get_events(): array
{

    try {
        $sql = "SELECT * FROM events";
        $query = $this->connection->query($sql);
        $event_items = $query->fetchAll(PDO::FETCH_ASSOC);


    } catch (\Exception $exception) {
        $event_items = [0 => ['id' => 1, 'den_mesiac' => '28.Feb', 'rok' => 2048, 'nazov' => 'Liga o pohár', 'info_o_evente' => 'Na lige sa zúčastnia sa 4 tímy. A to minuloroční Trnavčania ktorí sa stali víťazmi prvého kvalifikačného kola ligy, na 2. mieste sa vtedy umiestnil tím Golf Clubu Penati a na 3. mieste skončil tím Golf Clubu Welten Tento rok sa to môže zmeniť a preto neváhajte a navštívte nás.','lokalita' => 'Tály','cena' => 100]
            , 1 => ['id' => 2, 'den_mesiac' => '14.Mar', 'rok' => 2049, 'nazov' => 'Skús a vyhraj', 'info_o_evente' => 'Chceš sa naučiť hrať golf? Myslíš si že na to máš? Tak sa zapoj do súťaže o najlepšieho nováčika vyhraj skvelé ceny.','lokalita' => 'Bratislava','cena' => 50]];
    }

    return $event_items;
}




    public function print_events(array $event_items)
    {
        foreach ($event_items as $key => $item) {
            echo '<div class="row custom-block custom-block-bg">
                <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                    <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                        <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0">'.$item['den_mesiac'].'</h6>
                        <strong class="text-white">'.$item['rok'].'</strong>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                    <div class="custom-block-image-wrap">
                        
                            <img src="images/event/event'.$item['id'].'.jpg" class="custom-block-image img-fluid" alt="">
                      
                    </div>
                </div>

                <div class="col-lg-6 col-12 order-3 order-lg-0">
                    <div class="custom-block-info mt-2 mt-lg-0">
                        <a href="event-detail.html" class="events-title mb-3">'.$item['nazov'].'</a>
                        <p class="mb-0">'.$item['info_o_evente'].'</p>
                        <div class="d-flex flex-wrap border-top mt-4 pt-3">

                            <div class="mb-4 mb-lg-0">
                                <div class="d-flex flex-wrap align-items-center mb-1">
                                    <span class="custom-block-span">Lokalita:</span>

                                    <p class="mb-0">'.$item['lokalita'].'</p>
                                </div>

                                <div class="d-flex flex-wrap align-items-center">
                                    <span class="custom-block-span">Tiket:</span>

                                    <p class="mb-0">$'.$item['cena'].'</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            ';
        }
    }

    public function insert_events(int $id, string $den_mesiac, int $rok, string $nazov, string $info_o_evente, string $lokalita, int $cena): bool
    {
        $insert = false;
        $sql = "INSERT INTO events(id,den_mesiac,rok,nazov,info_o_evente,lokalita,cena) VALUES ('" . $id . "','" . $den_mesiac . "','" . $rok . "','" . $nazov . "','" . $info_o_evente . "','" . $lokalita . "','" . $cena . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

    public function delete_event_item(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM events WHERE id = " . $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné odstrániť. Chyba: " . $exception->getMessage();
        }

        return $delete;
    }

    public function getevent_item(int $id): array
    {
        {
            try {
                $sql = "SELECT * FROM events WHERE id = " . $id;
                $query = $this->connection->query($sql);
                $data = $query->fetch(\PDO::FETCH_ASSOC);


            } catch (\Exception $exception) {
                echo "Chyba: " . $exception->getMessage();
            }

            return $data;

        }
    }

    public function updateevent_item(int $id, string $den_mesiac, int $rok, string $nazov, string $info_o_evente, string $lokalita, int $cena): bool
    {
        try {
            $sql = "UPDATE events SET den_mesiac = :den_mesiac, rok = :rok, nazov = :nazov, info_o_evente = :info_o_evente, lokalita= :lokalita, cena = :cena WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'den_mesiac' => $den_mesiac,
                'rok' => $rok,
                'nazov' => $nazov,
                'info_o_evente' => $info_o_evente,
                'lokalita' => $lokalita,
                'cena' => $cena,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;

        }
        return $update;
    }
#membership

    public function getServices(): array
    {

        try {
            $sql = "SELECT * FROM membership";
            $query = $this->connection->query($sql);
            $membership_items = $query->fetchAll(PDO::FETCH_ASSOC);


        } catch (\Exception $exception) {
            $membership_items = [0 => ['id' => 1, 'sluzba' => 'Poistenie', 'tier1' => 'check', 'tier2' => 'check', 'tier3' => 'check']
                , 1 => ['id' => 1, 'sluzba' => 'Stravovanie', 'tier1' => 'check', 'tier2' => 'check', 'tier3' => 'check']];
        }

        return $membership_items;
    }

    public function printServices(array $Services_items)
    {
        foreach ($Services_items as $key => $item) {
            echo '  <tr>
            <th scope="row" class="text-start">'.$item['sluzba'].'</th>

            <td>
                <i class="bi-'.$item['tier1'].'-circle-fill"></i>
            </td>

            <td>
                <i class="bi-'.$item['tier2'].'-circle-fill"></i>
            </td>

            <td>
                <i class="bi-'.$item['tier3'].'-circle-fill"></i>
            </td>
        </tr>';
        }
    }

    public function insert_Services(string $sluzba, string $tier1, string $tier2, string $tier3): bool
    {
        $insert = false;
        $sql = "INSERT INTO membership(sluzba,tier1,tier2,tier3) VALUES ('" . $sluzba . "','" . $tier1 . "','" . $tier2 . "','" . $tier3 . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

    public function delete_Service_item(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM membership WHERE id = " . $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné odstrániť. Chyba: " . $exception->getMessage();
        }

        return $delete;
    }

    public function getService_item(int $id): array
    {
        {
            try {
                $sql = "SELECT * FROM membership WHERE id = " . $id;
                $query = $this->connection->query($sql);
                $data = $query->fetch(\PDO::FETCH_ASSOC);


            } catch (\Exception $exception) {
                echo "Chyba: " . $exception->getMessage();
            }

            return $data;

        }
    }

    public function updateservice_item(int $id,string $sluzba, string $tier1, string $tier2, string $tier3): bool
    {
        try {
            $sql = "UPDATE membership SET sluzba = :sluzba, tier1 = :tier1, tier2 = :tier2, tier3 = :tier3 WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'sluzba' => $sluzba,
                'tier1' => $tier1,
                'tier2' => $tier2,
                'tier3' => $tier3,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;

        }
        return $update;
    }
    #mail
    public function insertmail_item(string $email): bool
    {
        $insert = false;
        $sql = "INSERT INTO email(email) VALUES ('" . $email . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

    public function insertkontaktuj_item(string $meno_priezvisko,string $email,string $sprava): bool
    {
        $insert = false;
        $sql = "INSERT INTO footer_kontaktuj(meno_priezvisko,email,sprava) VALUES ('" . $meno_priezvisko . "','" . $email . "','" . $sprava . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

    public function insertbud_clen_item(string $meno_priezvisko,string $email,string $sprava): bool
    {
        $insert = false;
        $sql = "INSERT INTO novy_clen(meno_priezvisko,email,sprava) VALUES ('" . $meno_priezvisko . "','" . $email . "','" . $sprava . "')";
        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();

        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť. Chyba: " . $exception->getMessage();
        }
        return $insert;
    }

}

