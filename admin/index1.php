<?php include_once '../connection.php'; 
$text = '';
$text1 = "";
$text2 ="";
$text3 ="";
$new_path = "";


if(isset($_POST['enregistrer'])){
    $nom = htmlentities($_POST['firstname']);
    $prenom = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $sex = $_POST['sex'];
    $address = htmlentities($_POST['address']);
    $city = $_POST['city'];
    $grade = htmlentities($_POST['grade']);
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $naissance = $_POST['naissance'];

    $verify = $db->query("SELECT * FROM users WHERE nom = '$nom' AND prenom ='$prenom' AND role = 'teacher' ") or die(print_r($db->errorInfo()));
    if($verify->fetchColumn() > 0){
        $text = "Un compte avec ces informations existe déja";
    }else{
        $verify1 = $db->query("SELECT * FROM users WHERE login = '$username' ");
        if($verify1->fetchColumn() > 0){
            $text = "Ce username est déja utilisé";
        }else{
            $text1 = "Formateur enregistré avec succès";
            $db->query("INSERT INTO users(nom, prenom, sex, email, phone, quartier, ville, login, password, role, grade, date_naissance) VALUES('$nom', '$prenom', '$sex', '$email', '$phone', '$address', '$city', '$username', '$password', 'teacher', '$grade', '$naissance') ");

            echo '<script> showall(); </script>';
        }

    }

}

if(isset($_POST['save'])){
    $nom = htmlentities($_POST['firstname']);
    $prenom = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $quartier = htmlentities($_POST['address']);
    $sex = $_POST['sex'];
    $login = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $password1 = htmlentities($_POST['password1']);
    $date = $_POST['naissance'];
    $ville = htmlentities($_POST['city']);
    $fname = $_FILES['photo']["name"];
	$ext = explode(".",$fname)[1];
	$ext = strtolower($ext);
	$file_tmp = $_FILES['photo']['tmp_name'];
	$all_extensions = Array("png","jpg","jpeg","webp","svg");
	$path="../img/".$fname;
	
    $regist = $db->query('SELECT * from users WHERE nom="$nom" AND prenom="$prenom" AND role="student"') or die(print_r($db->errorInfo()));
    if($regist->fetchColumn() > 0){
        $text2 = "Un compte avec ces informations existe déja";
    }elseif($password != $password1){
        $text2 = "Les mots de passe ne sont pas identiques";
    }
    else{
        if(in_array($ext,$all_extensions)){
            move_uploaded_file($file_tmp,$path);
            if(rename("../img/".$fname, "../img/".$nom.".".$ext)){
            $new_path = "../img/".$nom.".".$ext;
            }
        }
        
        $db->exec("INSERT INTO users(nom, prenom, sex, phone, email, quartier, ville, login, password, date_naissance, role, photo) VALUES('$nom', '$prenom', '$sex', '$phone', '$email', '$quartier', '$ville', '$login', '$password', '$date', 'student', '$new_path')");

        $text3 = "Compte crée avec succès";
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
                <li class="side-dashboard" onclick="window.location.assign('dashboard.php')">
                    <a class="active"><span class="las la-igloo"></span>
                               <span>Dashboard</span>
                    </a>
                </li>
                <li class="side-instructors" onclick="window.location.assign('formateurs.php')">
                    <a><span class="las la-chalkboard-teacher"></span>
                               <span>Formateurs</span>
                    </a>
                </li>
                <li class="side-students" onclick="window.location.assign('apprenants.php')">
                    <a><span class="las la-book-reader"></span>
                               <span>Apprenants</span>
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
                <li class="side-activities" onclick="window.location.assign('activites.php')">
                    <a><span class="las la-tasks"></span>
                               <span>Activités</span>
                    </a>
                </li>
                <li class="side-account" onclick="window.location.assign('compte.php')">
                    <a><span class="las la-user-circle"></span>
                               <span>Mon Compte</span>
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
                <img src="../img/choco.jpg" alt="" width="40px" height="40px">
                <div>
                    <h4>Hilary Madjou</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <?php $apprenants = $db->query("SELECT COUNT(*) from users WHERE role ='student'");
              $teachers = $db->query("SELECT COUNT(*) from users WHERE role ='teacher'");
              $forums = $db->query("SELECT COUNT(*) from forums");
              $lessons = $db->query("SELECT COUNT(*) from formations");

        ?>
        <main class="dashboard">
            <div class="cards">
                <div class="card-single">
                    <div class="side-formateurs">
                    <?php foreach($teachers as $teacher){ ?>
                        <h1>
                            <?php if($teacher[0] < 10){
                                        echo "0". $teacher[0];
                                  }else{ 
                                      echo $teacher[0];
                                       }
                            ?>
                        </h1>
                        <?php } ?>
                        <span>Formateurs</span>
                    </div>
                    <div>
                        <span class="las la-chalkboard-teacher"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                       <?php foreach($apprenants as $apprenant){ ?>
                        <h1>
                        <?php if($apprenant[0] < 10){
                                        echo "0". $apprenant[0];
                                  }else{ 
                                      echo $apprenant[0];
                                       }
                            ?>                            
                        </h1>
                        <?php } ?>
                        <span>Apprenants</span>
                    </div>
                    <div>
                        <span class="las la-user-graduate"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <?php foreach($forums as $forum){ ?>
                            <h1>
                                <?php if($forum[0] < 10){
                                            echo "0". $forum[0];
                                    }else{ 
                                        echo $forum[0];
                                        }
                                ?>
                            </h1>
                        <?php } ?>
                        <span>Forums</span>
                    </div>
                    <div>
                        <span class="las la-comments"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                    <?php foreach($lessons as $lesson){ ?>
                            <h1>
                                <?php if($lesson[0] < 10){
                                            echo "0". $lesson[0];
                                    }else{ 
                                        echo $lesson[0];
                                        }
                                ?>
                            </h1>
                        <?php } ?>
                        <span>Formations</span>
                    </div>
                    <div>
                        <span class="las la-chalkboard"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Projects</h3>

                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Project Title</td>
                                            <td>Department</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status orange"></span><span>review</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status purple"></span><span></span>in progress </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status pink"></span><span></span>pending</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Stagiaires Récents</h3>
                            <button>Voir tout <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/choco.jpg" alt="" width="40px" height="40px">
                                    <div>
                                        <h4>Hilary Madjou</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                  <span class="las la-user-circle"></span>  
                                  <span class="las la-comment"></span>  
                                  <span class="las la-user-phone"></span>  
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/choco.jpg" alt="" width="40px" height="40px">
                                    <div>
                                        <h4>Hilary Madjou</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                  <span class="las la-user-circle"></span>  
                                  <span class="las la-comment"></span>  
                                  <span class="las la-user-phone"></span>  
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="../img/choco.jpg" alt="" width="40px" height="40px">
                                    <div>
                                        <h4>Hilary Madjou</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                  <span class="las la-user-circle"></span>  
                                  <span class="las la-comment"></span>  
                                  <span class="las la-user-phone"></span>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <main class="instructors">
            <div class="instructors-head">
                <button class="add side-add"><i class="las la-plus"></i><span>Ajouter</span></button>
                <span class="instructors-title">Liste Des Formateurs</span>
                <button class="see side-see"><i class="las la-file-archive"></i><span>Archives </span></button>
            </div>
            <div class="table_responsive1">
                <table class="instructors-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                $i = 1;
            $formateurs = $db->query("SELECT * FROM users WHERE role = 'teacher'");
                foreach($formateurs as $formateur){
            ?>

                        <tr>
                            <td><?= $i ?></td>
                            <?php  if(empty($formateur['photo'])){ ?>
                            <td><img src="../img/choco.jpg" alt=""></td>
                            <?php } else{ 
                             echo "<img src='../".$formateur['photo']."'>";
                            }?>
                            <td><?= $formateur['nom'] ?></td>
                            <td><?= $formateur['prenom'] ?></td>
                            <td><?= $formateur['phone'] ?></td>
                            <td><?= $formateur['email'] ?></td>
                            <td><?= $formateur['sex'] ?></td>
                            <td><?= $formateur['grade'] ?></td>
                            <td class="operations"><i class="las la-eye"></i><i class="las la-pen"></i><i class="las la-trash-alt"></i></td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </main>
        
        <main class="archives">
            <div class="add-instructors-head">
                <button class="back side-back1"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Archives des Formateurs</span>
            </div>
            <div class="table_responsive1">
                <table class="instructors-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                $i = 1;
            $formats = $db->query("SELECT * FROM allusers WHERE role = 'teacher'");
                foreach($formats as $format){
            ?>

                        <tr>
                            <td><?= $i ?></td>
                            <?php  if(empty($format['photo'])){ ?>
                            <td><img src="../img/choco.jpg" alt=""></td>
                            <?php } else{ 
                             echo "<td><img src='../".$format['photo']."'></td>";
                            }?>
                            <td><?= $format['nom'] ?></td>
                            <td><?= $format['prenom'] ?></td>
                            <td><?= $format['phone'] ?></td>
                            <td><?= $format['email'] ?></td>
                            <td><?= $format['sex'] ?></td>
                            <td><?= $format['grade'] ?></td>
                            <td class="operations"><i class="las la-trash-alt"></i></td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </main>

        <main class="students">
            <div class="students-head">
                    <button class="add side1-add"><i class="las la-plus"></i><span>Ajouter</span></button>
                    <span class="instructors-title">Liste Des Apprenants</span>
                    <button class="see side1-see"><i class="las la-file-archive"></i><span>Archives </span></button>
            </div>
                <div class="table_responsive1">
                    <table class="instructors-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    $i = 1;
                $students = $db->query("SELECT * FROM users WHERE role = 'student'");
                    foreach($students as $student){
                ?>

                            <tr>
                                <td><?= $i ?></td>
                                <?php  if(empty($student['photo'])){ ?>
                                <td><img src="../img/choco.jpg" alt=""></td>
                                <?php } else{ 
                                echo "<td><img src='../".$student['photo']."'></td>";
                                }?>
                                <td><?= $student['nom'] ?></td>
                                <td><?= $student['prenom'] ?></td>
                                <td><?= $student['phone'] ?></td>
                                <td><?= $student['email'] ?></td>
                                <td><?= $student['sex'] ?></td>
                                <td class="operations"><i class="las la-eye"></i><i class="las la-pen"></i><i class="las la-trash-alt"></i></td>
                            </tr>
                            <?php $i++;} ?>
                        </tbody>
                    </table>
                </div>
        </main>
        <main class="add-students">
            <div class="add-instructors-head">
                <button class="back side-back4"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Ajout d'Un Apprenant</span>
            </div>
            <div class="wrapper">
                <form class="form" method="post" action="index.php" enctype='multipart/form-data'>
                    <span style="color:red"><?= $text2; ?></span>
                    <span style="color:green"><?= $text3; ?></span>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="lastname">Prénom</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="firstname">Nom</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="phone">Telephone</label>
                            <input type="tel" name="phone" class="form-control" maxlength="9" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex" class="form-control" required>
                                <option value="feminin">Feminin</option>
                                <option value="masculin">Masculin</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="address">Adresse</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="city">Ville</label>
                            <select name="city" id="city" class="form-control" required>
                                <option value="douala">Douala</option>
                                <option value="yaounde">Yaounde</option>
                                <option value="bertoua">Bertoua</option>
                                <option value="maroua">Maroua</option>
                                <option value="edea">Edea</option>
                                <option value="garoua">Garoua</option>
                                <option value="nkongsamba">Nkongsamba</option>
                                <option value="ebolowa">Ebolowa</option>
                                <option value="loum">Loum</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="password">Confirmation de mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="naissance">Date de naissance</label>
                            <input type="date" name="naissance" class="form-control" required>
                        </div>
                        <div class="input-field" style="width:400px">
                            <label for="photo">Photo</label>
                            <label for="photo">
                                <img src="../img/avatar.png" alt="">
                            <input type="file" id="photo" name="photo" hidden="" size=50 class="form-control">
                            </label>
                        </div>
                    </div>
                <button class="" type="submit" name="save">Enregistrer</button>
                </form>
            </div>
        </main>
        <main class="archives1">
            <div class="add-instructors-head">
                <button class="back side-back2"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Archives des Apprenants</span>
            </div>
            <div class="table_responsive1">
                <table class="instructors-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                $i = 1;
            $studs = $db->query("SELECT * FROM allusers WHERE role = 'teacher'");
                foreach($studs as $stud){
            ?>

                        <tr>
                            <td><?= $i ?></td>
                            <?php  if(empty($stud['photo'])){ ?>
                            <td><img src="../img/choco.jpg" alt=""></td>
                            <?php } else{ 
                             echo "<img src='../".$formateur['photo']."'>";
                            }?>
                            <td><?= $stud['nom'] ?></td>
                            <td><?= $stud['prenom'] ?></td>
                            <td><?= $stud['phone'] ?></td>
                            <td><?= $stud['email'] ?></td>
                            <td><?= $stud['sex'] ?></td>
                            <td><?= $stud['grade'] ?></td>
                            <td class="operations"><i class="las la-trash-alt"></i></td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </main>

        <main class="messages">

        </main>

        <main class="forums">

        </main>

        <main class="notifications">

        </main>

        <main class="activities">

        </main>

        <main class="account">

        </main>

    </div>

    <script type="text/javascript">

        var dashboard = document.querySelector(".dashboard");
        var dashboard1 = document.querySelector(".side-dashboard");

        var instructors = document.querySelector(".instructors");
        var instructors1 = document.querySelector(".side-instructors");

        var students = document.querySelector(".students");
        var students1 = document.querySelector(".side-students");

        var messages = document.querySelector(".messages");
        var messages1 = document.querySelector(".side-messages");

        var forums = document.querySelector(".forums");
        var forums1 = document.querySelector(".side-forums");

        var notifications = document.querySelector(".notifications");
        var notifications1 = document.querySelector(".side-notifications");

        var activities = document.querySelector(".activities");
        var activities1 = document.querySelector(".side-activities");

        var account = document.querySelector(".account");
        var account1 = document.querySelector(".side-account");

        var add = document.querySelector(".add-instructors");
        var add1 = document.querySelector(".side-add");
        
        var sadd = document.querySelector(".add-students");
        var sadd1 = document.querySelector(".side1-add");

        var back = document.querySelector(".instructors");
        var back1 = document.querySelector(".side-back");

        var see = document.querySelector(".archives");
        var see1 = document.querySelector(".side-see");

        var sees = document.querySelector(".archives1");
        var sees1 = document.querySelector(".side1-see");

        var formateurs = document.querySelector(".instructors");
        var formateurs1 = document.querySelector(".side-formateurs");

        var backs = document.querySelector(".instructors");
        var backs1 = document.querySelector(".side-back1");

        var sback = document.querySelector(".students");
        var sback1 = document.querySelector(".side-back2");

        var stback = document.querySelector(".students");
        var stback1 = document.querySelector(".side-back4");

        window.onload = function(){
            sessionStorage.setItem("prev", ".dashboard");
        }

        dashboard1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            dashboard.style.display='block';
            sessionStorage.setItem("prev", ".dashboard");
        }

        instructors1.onclick = function(){
          var previous = sessionStorage.getItem("prev");
            console.log(previous)
             previous = document.querySelector(previous);
            previous.style.display='none';
            instructors.style.display='flex';
            sessionStorage.setItem("prev", ".instructors");
        }

       students1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
            console.log(previous)
             previous = document.querySelector(previous);
            previous.style.display='none';
            students.style.display='flex';
            sessionStorage.setItem("prev", ".students");
        }
        
         messages1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
            console.log(previous)
             previous = document.querySelector(previous);
            previous.style.display='none';
            messages.style.display='flex';
            sessionStorage.setItem("prev", ".messages");
        }
         forums1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            forums.style.display='flex';
            sessionStorage.setItem("prev", ".forums");
        }
        notifications1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            notifications.style.display='flex';
            sessionStorage.setItem("prev", ".notifications");
        }
        activities1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            activities.style.display='flex';
            sessionStorage.setItem("prev", ".activities");
        }
        account1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            account.style.display='flex';
            sessionStorage.setItem("prev", ".account");
        }
        add1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            add.style.display='flex';
            sessionStorage.setItem("prev", ".add-instructors");
        }
        sadd1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            sadd.style.display='flex';
            sessionStorage.setItem("prev", ".add-students");
        }
        back1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            back.style.display='flex';
            sessionStorage.setItem("prev", ".instructors");
        }
        stback1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            stback.style.display='flex';
            sessionStorage.setItem("prev", ".students");
        }
        backs1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            backs.style.display='flex';
            sessionStorage.setItem("prev", ".instructors");
        }
        sback1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            sback.style.display='flex';
            sessionStorage.setItem("prev", ".students");
        }
        see1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            see.style.display='flex';
            sessionStorage.setItem("prev", ".archives");
        }
        sees1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            sees.style.display='flex';
            sessionStorage.setItem("prev", ".archives1");
        }
        formateurs1.onclick = function(){
            var previous = sessionStorage.getItem("prev");
             previous = document.querySelector(previous);
            previous.style.display='none';
            formateurs.style.display='flex';
            sessionStorage.setItem("prev", ".instructors");
        }
        
    </script>


</body>
</html>