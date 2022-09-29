<?php
    include_once '../connection.php'; 
    session_start();
    $text4="";
    $text5="";
    $new_path = "";
    $createur = $_SESSION['name'];

    if(isset($_POST['add'])){
        $nom = htmlentities($_POST['names']);
        $prix= htmlentities($_POST['price']);
        
        $fname = $_FILES['photos']["name"];
        $ext = explode(".",$fname)[1];
        $ext = strtolower($ext);
        $file_tmp = $_FILES['photos']['tmp_name'];
        $all_extensions = Array("png","jpg","jpeg","webp","svg");
        $path="../img/".$fname;
        
        $add = $db->query("SELECT * from class WHERE class_name='$nom'") or die(print_r($db->errorInfo()));
        if($add->fetchColumn() > 0){
            $text4 = "Une classe avec ce titre existe déja";
        }
        else{
            if(in_array($ext,$all_extensions)){
                move_uploaded_file($file_tmp,$path);
                if(rename("../img/".$fname, "../img/".$nom.".".$ext)){
                $new_path = "img/".$nom.".".$ext;
                }
            }
    
            $db->exec("INSERT INTO class(class_name, class_level) VALUES('$nom', '$prix')");
            $text5 = "class ajoutée avec succès";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISE</title>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
            <span><img src="../img/wise.jpg"  width="40px" ></span><span onclick="window.location.assign('../index.php')">WISE TRAINING</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li class="side-dashboard" onclick="window.location.assign('index.php')">
                    <a><span class="las la-igloo"></span>
                               <span>Dashboard</span>
                    </a>
                </li>
                <p>Gestion des apprenants</p>
                <li class="side-students" onclick="window.location.assign('apprenants.php')">
                    <a><span class="las la-book-reader"></span>
                               <span>Apprenants</span>
                    </a>
                </li>
                <p>Autres</p>
                <li class="side-formations"  onclick="window.location.assign('formations.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
                               <span>Formations</span>
                    </a>
                </li>
                <li class="side-formations"  onclick="window.location.assign('class.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
                               <span>Class</span>
                    </a>
                </li>
                <li class="side-messages" onclick="window.location.assign('messages.php')">
                    <a><span class="las la-sms"></span>
                               <span>Message</span>
                    </a>
                </li>
                <li class="side-forums" onclick="window.location.assign('forums.php')">
                    <a><span class="lab la-rocketchat"></span>
                               <span>Forums</span>
                    </a>
                </li>
                <li class="side-notifications" onclick="window.location.assign('programmes.php')">
                    <a><span class="las la-tasks"></span>
                               <span>Programmes</span>
                    </a>
                </li>
                <p>Personnel</p>
                <li class="side-account" onclick="window.location.assign('compte.php')">
                    <a><span class="las la-user-circle"></span>
                               <span>Mon Compte</span>
                    </a>
                </li>
                <li class="side-account" onclick="window.location.assign('../deconnexion.php')">
                    <a><span class="las la-user-circle"></span>
                               <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                        Dashboard
                    </label>
                </h2>
            </div>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" name="" id="" placeholder="">
            </div>

            <div class="user-wrapper">
                <?php  if(empty($_SESSION['photo'])){
                    echo "<img src='../img/avatar.png' alt='' width='40px' height='40px'>";
                }else{
                    ?>  
                   <img src='<?= $_SESSION["photo"] ?>' alt='' width='40px' height='40px'>
                <?php } ?>
                <div>
                    <h4><?= $_SESSION["username"] ?></h4>
                    <small>Formateur</small>
                </div>
            </div>
        </header>
        <main class="add-formations">
            <div class="add-instructors-head">
                <button class="back formations-back" onclick="window.location.assign('class.php')"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Ajout d'Une classe</span>
            </div>
            <div class="wrapper">
                <form class="form" method="post" action="addclass.php" enctype='multipart/form-data'>
                <span style="color:red"><?= $text4; ?></span>
                    <span style="color:green"><?= $text5; ?></span>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="name">nom de la classe</label>
                            <input type="text" name="names" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="price">niveau de la class</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>
                    </div>
                    
                    
                    
                    <button class="" type="submit" name="add">Ajouter</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>