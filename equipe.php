<?php include_once 'header.php'; ?>
<!-- Affichage des formateurs -->
  <section id="team" class="teams">
        <div class="container py-2 my-3 text-center" >
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
                      <h3><?= $nom ?></h3>
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
                  
              </div>              
            </div>
          </div>
        </div>
    </section>




<?php include_once 'footer.php'; ?>
