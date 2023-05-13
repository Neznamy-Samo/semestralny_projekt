<?php
include_once "functions_body.php";
use main\body;
$bodyObj = new body();
$event_items = $bodyObj->get_events();


?>


<section class="events-section section-bg section-padding" id="section_4">
    <div class="container">
        <div>
            <div class="col-lg-12 col-12">
                <h2 class="mb-lg-3">Nastávajúce udalosti</h2>
            </div>
            <?php
            $bodyObj->print_events($event_items);
            ?>
            </div>
        </div>
    </div>
</section>