
<?php
include_once "functions_body.php";
use main\body;
$bodyObj = new body();
$team_member_items = $bodyObj->getTeam_member();

?>

<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-lg-5 mb-4">O našej firme</h2>
            </div>

            <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                <h3 class="mb-3">História</h3>



                <p>Národný golfový klub bol založený 16. mája 1999. 18. júna 1999 bolo slávnostne otvorené zázemie klubu vo forme provizórneho objektu. V prvom roku existencie sa klub v športovej činnosti zameral na výchovu juniorov, ktorí reprezentovali náš  klub už na Juniorských majstrovstvách Slovenska v Košiciach v auguste roku 1999. 31. októbra 1999 bola  prvá sezóna slávnostne ukončená záverečným jesenným turnajom.
                </p>
            </div>

            <?php
            $bodyObj->printTeam_member($team_member_items);
            ?>

        </div>
    </div>
</section>