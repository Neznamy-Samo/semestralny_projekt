<?php
include_once "functions_body.php";
use main\body;
$bodyObj = new body();
$Services_items = $bodyObj->getServices();


?>


<section class="membership-section section-padding" id="section_3">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                <h2><span>Predplatné</span> do národného golfového klubu</h2>
            </div>

            <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                <h4 class="mb-4 pb-lg-2">Predplatné</h4>
        <div class="table-responsive">
            <table class="table text-center">
              <thead>
            <tr>
              <th style="width: 34%">Typy predplatného</th>

              <th style="width: 22%;">TIER 1</th>

              <th style="width: 22%;">TIER 2</th>

              <th style="width: 22%;">TIER 3</th>
        </tr>
        </thead>

        <tbody>

        <?php
        $bodyObj->printServices($Services_items);
        ?>
        </tbody>
    </table>
        </div>
    </div>
            <div class="col-lg-5 col-12 mx-auto">
                <h4 class="mb-4 pb-lg-2">Pridaj sa k nám!</h4>
                <form action="handler/handler_bud_clen.php" method="post" class="custom-form membership-form shadow-lg" role="form">
                    <h4 class="text-white mb-4">Staň sa členom</h4>

                    <div class="form-floating">
                        <input type="text" name="meno_priezvisko" id="full-name" class="form-control" placeholder="Full Name" required="">

                        <label for="floatingInput">Meno priezvisko</label>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">

                        <label for="floatingInput">Emailová adresa</label>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="message" name="sprava" placeholder="Describe message here"></textarea>

                        <label for="floatingTextarea"> Správa</label>
                    </div>

                    <button type="submit" name="submit" class="form-control">Odoslať</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</section>
