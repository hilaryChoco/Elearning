<?php include_once 'header.php'; ?>

<!-- Affichage des formations grands publics -->
    <section class="teams">
        <div class="container py-3 my-3 text-center">
            <div class="row mb-3">
                <div class="col">
                    <h1 class="section-title text-center mb-3">Formations grands publics</h1>
                    <div class="row text-center g-4 py-5">
                    <?php $personals1 = $db->query("SELECT * FROM formations WHERE type='public' ");
             foreach($personals1 as $personal1){
              $count1 = $personal1['id'];
            ?>
                <div class="col-lg-4 col-md-4" style="margin-bottom:40px">
                    <div class="card bg-secondary text-light">
                    <img src='<?= $personal1["photo"] ?>' class="card-img-top" alt='' width='298px' height='200px'>
                        <div class="card-body text-center">
                          <div class="course-info mb-2 pb-2">
                            <h3 class="card-title mb-3 text-warning"><?= $personal1['libelle'] ?></h3>
                            <span><?= $personal1['prix'] ?> XAF</span>
                          <?php $studnumbers1 = $db->query("SELECT COUNT(*) FROM formations_students WHERE id_formation ='$count1' ");
                          foreach($studnumbers1 as $studnumber1){ ?>
                            <span style="margin-left:23px">
                                <?php if($studnumber1[0] < 10){
                                            echo "0". $studnumber1[0]." Apprenants";
                                      }else{ 
                                          echo $studnumber1[0]. " Apprenants";
                                           }
                                ?>
                            </span>
                          <?php } ?>            
                          </div>
                          <div style="display:flex; flex-direction: row">
                            <a href="formation_view.php?id=<?= $personal1['id']; ?>" style="" class="btn btn-primary text-white fw-bold"> Details</a>
                            <a href="apprenant/paiement.php?id=<?= $personal1['id'] ?>" style="margin-left:10px" class="btn btn-warning text-white fw-bold">Commencer la formation</a>
                          </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once 'footer.php'; ?>
