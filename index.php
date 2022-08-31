<?php include_once 'header.php'; ?>

      <!-- Caroussel -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/cahier.jpg" class="d-block w-100" alt="Image" height="490px">
      <div class="carousel-caption d-none d-md-block">
        <h6>Formez vous en <i>Informatique</i></h6>
        <p>(Bureautique, Developpement Web, Base de données ...).</p>

        <div class="slider-btn mb-4">
          <button class="btn btn1 bg-warning fw-bold"><a href="#formations">Nos Formations</a></button>
        </div>
        <div class="row slider-stat container d-flex justify-content-around">
          <div class="col-2 p-3">
            <?php $profs = $db->query("SELECT COUNT(*) from users WHERE role ='teacher'");
               foreach($profs as $prof){ ?>
                        <span>
                            <?php if($prof[0] < 10){
                                        echo "0". $prof[0];
                                  }else{ 
                                      echo $prof[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formateurs</span>
          </div>
          <div class="col-2 p-3">
            <?php $subjects = $db->query("SELECT COUNT(*) from formations");
               foreach($subjects as $subject){ ?>
                        <span>
                            <?php if($subject[0] < 10){
                                        echo "0". $subject[0];
                                  }else{ 
                                      echo $subject[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formations</span>
          </div>
          <div class="col-2 p-3">
            <?php $eleves = $db->query("SELECT COUNT(*) from users WHERE role ='student'");
               foreach($eleves as $eleve){ ?>
                        <span>
                            <?php if($eleve[0] < 10){
                                        echo "0". $eleve[0];
                                  }else{ 
                                      echo $eleve[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Apprenants</span>
          </div>
          <div class="col-2 p-3 d-flex flex-column">
            <?php $chapters = $db->query("SELECT COUNT(*) from cours");
               foreach($chapters as $chapter){ ?>
                        <span>
                            <?php if($chapter[0] < 10){
                                        echo "0". $chapter[0];
                                  }else{ 
                                      echo $chapter[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Cours</span>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/cahier2.jpg" class="d-block w-100" alt="Image" height="490px">
      <div class="carousel-caption d-none d-md-block " style="margin-top:-250px">
        <h5 class="mt-5">Une equipe qualifiée</h5>
        <p>Nous mettons à votre disposition des ingénieurs de haute qualité.</p>

        <div class="slider-btn mb-5">
          <button class="btn bg-warning fw-bold"><a href="#team">Qui sommes-nous ?</a></button>
        </div>
        <div class="row slider-stat container d-flex justify-content-around">
        <div class="col-2 p-3">
            <?php $profs = $db->query("SELECT COUNT(*) from users WHERE role ='teacher'");
               foreach($profs as $prof){ ?>
                        <span>
                            <?php if($prof[0] < 10){
                                        echo "0". $prof[0];
                                  }else{ 
                                      echo $prof[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formateurs</span>
          </div>
          <div class="col-2 p-3">
            <?php $subjects = $db->query("SELECT COUNT(*) from formations");
               foreach($subjects as $subject){ ?>
                        <span>
                            <?php if($subject[0] < 10){
                                        echo "0". $subject[0];
                                  }else{ 
                                      echo $subject[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formations</span>
          </div>
          <div class="col-2 p-3">
            <?php $eleves = $db->query("SELECT COUNT(*) from users WHERE role ='student'");
               foreach($eleves as $eleve){ ?>
                        <span>
                            <?php if($eleve[0] < 10){
                                        echo "0". $eleve[0];
                                  }else{ 
                                      echo $eleve[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Apprenants</span>
          </div>
          <div class="col-2 p-3 d-flex flex-column">
            <?php $chapters = $db->query("SELECT COUNT(*) from cours");
               foreach($chapters as $chapter){ ?>
                        <span>
                            <?php if($chapter[0] < 10){
                                        echo "0". $chapter[0];
                                  }else{ 
                                      echo $chapter[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Cours</span>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/cahier1.jpg" class="d-block w-100" alt="Image" height="490px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Contactez nous</h5>
        <p>Nous sommes disponible pour vous.</p>

        <div class="slider-btn mb-5">
          <button class="btn btn bg-warning fw-bold"><a href="contact.php">Contact</a></button>
        </div>
        <div class="row slider-stat container d-flex justify-content-around">
        <div class="col-2 p-3">
            <?php $profs = $db->query("SELECT COUNT(*) from users WHERE role ='teacher'");
               foreach($profs as $prof){ ?>
                        <span>
                            <?php if($prof[0] < 10){
                                        echo "0". $prof[0];
                                  }else{ 
                                      echo $prof[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formateurs</span>
          </div>
          <div class="col-2 p-3">
            <?php $subjects = $db->query("SELECT COUNT(*) from formations");
               foreach($subjects as $subject){ ?>
                        <span>
                            <?php if($subject[0] < 10){
                                        echo "0". $subject[0];
                                  }else{ 
                                      echo $subject[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Formations</span>
          </div>
          <div class="col-2 p-3">
            <?php $eleves = $db->query("SELECT COUNT(*) from users WHERE role ='student'");
               foreach($eleves as $eleve){ ?>
                        <span>
                            <?php if($eleve[0] < 10){
                                        echo "0". $eleve[0];
                                  }else{ 
                                      echo $eleve[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Apprenants</span>
          </div>
          <div class="col-2 p-3 d-flex flex-column">
            <?php $chapters = $db->query("SELECT COUNT(*) from cours");
               foreach($chapters as $chapter){ ?>
                        <span>
                            <?php if($chapter[0] < 10){
                                        echo "0". $chapter[0];
                                  }else{ 
                                      echo $chapter[0];
                                       }
                            ?>
                        </span>
              <?php } ?>
            <span>Cours</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  
  <!-- Affichage des formations grands publics -->
    <section class="p-3 my-3 bg-light" id="formations">
        <div class="container py-3 text-center">
        <div class="row mb-3">
            <div class="col">
          <h1 class="section-title text-center mb-3">Formations grands publics</h1>

            <div class="row text-center g-4 py-5">
              <?php $publics1 = $db->query("SELECT * FROM formations WHERE type='public' ");
          foreach($publics1 as $public1){
              $count = $public1['id'];
            ?>
                <div class="col-lg-4 col-md-4" style="margin-bottom:40px">
                    <div class="card bg-secondary text-light">
                    <img src='<?= $public1["photo"] ?>' class="card-img-top" alt='' width='298px' height='200px'>
                        <div class="card-body text-center">
                          <div class="course-info mb-2 pb-2">
                            <h3 class="card-title mb-3 text-warning"><?= $public1['libelle'] ?></h3>
                            <span><?= $public1['prix'] ?> XAF</span>
                          <?php $studnumbers = $db->query("SELECT COUNT(*) FROM formations_students WHERE id_formation ='$count' ");
                          foreach($studnumbers as $studnumber){ ?>
                            <span style="margin-left:23px">
                                <?php if($studnumber[0] < 10){
                                            echo "0". $studnumber[0]." Apprenants";
                                      }else{ 
                                          echo $studnumber[0]. " Apprenants";
                                           }
                                ?>
                            </span>
                          <?php } ?>            
                          </div>
                          <div style="display:flex; flex-direction: row">
                            <a href="formation_view.php?id=<?= $public1['id']; ?>" style="" class="btn btn-primary text-white fw-bold"> Details</a>
                            <a href="apprenant/paiement.php?id=<?= $public1['id'] ?>" style="margin-left:10px" class="btn btn-warning text-white fw-bold">Commencer la formation</a>
                          </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
              <button class="btn btn-warning" onclick='window.location.assign("formationsp.php")'><i style="color:white" class="fa fa-plus"></i> Voir plus</button>
            </div>
          </div>
        </div>
        </div>
    </section>

    <!-- Affichage des formations personnalisées -->
    <section class="p-3 my-3">
        <div class="container py-3 text-center">
          <div class="row mb-3">
            <div class="col">
          <h1 class="section-title text-center mb-3">Formations Spécialisées</h1>
            <div class="row text-center g-4 py-5">
            <?php $personals1 = $db->query("SELECT * FROM formations WHERE type='personnalisee' limit 3 ");
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
            <div class="d-flex justify-content-center">
              <button class="btn btn-warning" onclick='window.location.assign("formationss.php")'><i style="color:white" class="fa fa-plus"></i> Voir plus</button>
            </div>
          </div> 
        </div> 
        </div>
    </section>

    <!-- Affichage des formateurs -->
    <section id="team">
      <div class="container py-3 text-center" >
          <div class="row mb-3">
            <div class="col">
              <h1>Notre Equipe</h1>
              <p class="mt-3 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis illo quibusdamnostrum.</p>
              <div class="row py-5">
                <?php $teachers = $db->query("SELECT * FROM users WHERE role='teacher' limit 3"); 
                foreach($teachers as $teacher){
                  $nom = $teacher['prenom']. " ". $teacher['nom'];
                ?>
              <div class="col-lg-4 col-md-4"  style="margin-bottom:70px">
                <div class="card">
                  <div class="card-body">
                    <?php if(empty($teacher['photo'])){
                      echo "<img src='img/avatar.png' alt='Image' class='img-fluid rounded-circle w-50 mb-3'>";
                    }else{
                    ?>
                    <img src='<?= $teacher["photo"] ?>' alt="Image" class="img-fluid rounded-circle w-50 mb-3">
                    <?php 
                    }
                    ?>                    
                    <h3 style="text-transform:capitalize"><?= $nom ?></h3>
                    <h5><?= $teacher['grade']; ?></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae at cupiditate ipsum ut sapiente sint aperiam eum quisquam facis iste!</p>

                        <div class="d-flex flex-row justify-content-center">
                          <div class="p-3">
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <i class="fa fa-twitter"></i>
                              </li>
                              <li class="list-inline-item">
                                <i class="fa fa-facebook"></i>
                              </li>
                              <li class="list-inline-item">
                                <i class="fa fa-instagram"></i>
                              </li>
                            </ul>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <?php } ?>

            <div class="d-flex justify-content-center">
                <button class="btn btn-warning" onclick='window.location.assign("equipe.php")'><i style="color:white" class="fa fa-plus"></i> Voir plus</button>
            </div>

            </div>
            </div>
          </div>
      </div>
    </section>

		<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/cahier1.jpg);">
    <div class="container-fluid py-5 my-3 text-center" >
          <div class="row mb-3">
            <div class="col">
              <h1 class="mb-5">Formations les plus suivies</h1>
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <div class="card">
                      <img src="img/cahier.jpg" class="card-img-top" alt="Image" height="200px">
                      <div class="card-body">
                        <a>Hilary</a>
                        <h5>director</h5>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
    </div>
    </section>

    <?php include_once 'footer.php'; ?>