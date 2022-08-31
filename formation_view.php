<?php include_once 'header.php'; 

if(isset($_GET['id']) ){
    if($_GET['id']!=""){
        $id1 = $_GET['id'];
        $n = $db->query("SELECT * FROM formations  WHERE id = '$id1' ") or die(print_r($db->errorInfo()));
    }
}
?>
<main class="formation_view"> 
            <?php foreach($n as $key){ 
                $count2 = $key['id'];
            ?>

            <div class="formation_view_left">
                <div class="left_top">
                    <h1><?= $key['libelle'] ?></h1>
                    <p style="font-size:20px"><?= $key['description'] ?></p>
                    <?php $studnumbers2 = $db->query("SELECT COUNT(*) FROM formations_students WHERE id_formation ='$count2' ");
                          foreach($studnumbers2 as $studnumber2){ ?>
                            <div style="margin-bottom:20px">
                                <?php if($studnumber2[0] < 10){
                                            echo "0". $studnumber2[0]." Apprenants";
                                      }else{ 
                                          echo $studnumber2[0]. " Apprenants";
                                           }
                                ?>
                            </div>
                          <?php } ?>  
                    <div style="margin-bottom:20px">Crée par <span style="font-weight:bold"><?= $key['cree_par'] ?></span></div> 
                    <div>
                        <i class="fa fa-asterisk" aria-hidden="true"></i> Dernière mise à jour: <span style="font-weight:bold"><?php if($key['update_date'] == 0){
                        echo $key['date_creation'];
                        }else{
                            echo $key['update_date'];
                        } ?>
                        <span>
                    </div>    
                </div>

                <div class="left_bottom" style="margin-top:20px; margin-bottom:50px">
                    <h4>Cours de la formation</h4>
                    <?php 
                    $i = 1;
                    $lessons = $db->query("SELECT libelle FROM cours WHERE id_formation ='$count2' ");
                    foreach($lessons as $lesson){ ?>
                    <div>
                        <span><?= $i. "- "; ?></span>
                        <span><?= $lesson['libelle'] ?></span>
                    </div>

                    <?php $i++; } ?>
                </div>

            </div>

            <div class="formation_view_right">
                <?php echo "<img src='".$key['photo']."' alt='' width='300px' height='180px' style='margin-left: 10px; margin-bottom:5px'>"; ?>
                <span style="font-weight:bold; font-size:20px; margin-left: 10px"><?= $key['prix'] ?> XAF</span>
                <a href="apprenant/paiement.php?id=<?= $id1 ?>" class="btn btn-warning text-white fw-bold" style="margin-left:10px; width:300px">Commencer la formation</a>
            </div>

            <?php } ?>
        </main>


<?php include_once 'footer.php'; ?>