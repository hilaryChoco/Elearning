<?php include_once 'header.php';

$new_path = "";
$text = "";
$text1 = "";
if(isset($_POST['inscrire'])){
    $nom = strtolower(htmlentities($_POST['nom']));
    $prenom = strtolower(htmlentities($_POST['prenom']));
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $quartier = htmlentities($_POST['quartier']);
    $sex = $_POST['sex'];
    $login = htmlentities($_POST['login']);
    $password = htmlentities($_POST['password']);
    $password1 = htmlentities($_POST['password1']);
    $date = $_POST['date_naissance'];
    $ville = htmlentities($_POST['ville']);
    $fname = $_FILES['photo']["name"];
	$ext = explode(".",$fname)[1];
	$ext = strtolower($ext);
	$file_tmp = $_FILES['photo']['tmp_name'];
	$all_extensions = Array("png","jpg","jpeg","webp","svg");
	$path="img/".$fname;
	
    $regist = $db->query('SELECT * from users WHERE nom="$nom" AND prenom="$prenom" AND role="student"') or die(print_r($db->errorInfo()));
    if($regist->fetchColumn() > 0){
        $text = "Un compte avec ces informations existe déja";
    }elseif($password != $password1){
        $text = "Les mots de passe ne sont pas identiques";
    }
    else{
        $user = $db->query("SELECT * from users WHERE login = '$login' ") or die(print_r($db->errorInfo()));
        if($user->fetchColumn() > 0){
            $text = "Ce username est déja utilisé, veuillez choisir un autre";
        }
        else{
            if(in_array($ext,$all_extensions)){
                move_uploaded_file($file_tmp,$path);
                if(rename("img/".$fname, "img/".$nom.".".$ext)){
                $new_path = "img/".$nom.".".$ext;
                }
            }
            
            $db->exec("INSERT INTO users(nom, prenom, sex, phone, email, quartier, ville, login, password, date_naissance, role, photo) VALUES('$nom', '$prenom', '$sex', '$phone', '$email', '$quartier', '$ville', '$login', '$password', '$date', 'student', '$new_path')");
            $db->exec("INSERT INTO allusers(nom, prenom, sex, phone, email, quartier, ville, login, password, date_naissance, role, photo) VALUES('$nom', '$prenom', '$sex', '$phone', '$email', '$quartier', '$ville', '$login', '$password', '$date', 'student', '$new_path')");
    
            $text1 = "Compte crée avec succès";
    
            echo "<script> window.location.assign('login.php'); </script>";
        }
        
    }

}
?>
<body class="registration-form">
    

<section class="form registration">
    <div class="container-fluid ">
        <div class="container">
            <form class="row p-3 modal1" method="POST" action="register.php" enctype='multipart/form-data'>
            <h2 class="text-center fw-bold mb-5" style="font-family:Comic Sans MS, Comic Sans, cursive">Inscription de l'apprenant</h2>
            <span style="color:red; text-align:center; font-size:20px"><?= $text; ?></span>
            <span style="color:green; text-align:center; font-size:20px"><?= $text1; ?></span>

                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telephone</label>
                        <input type="tel" name="phone" class="form-control" id="phone" maxlength="9" minlength="9" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="quartier" class="form-label">Adresse</label>
                        <input type="text" name="quartier" class="form-control" id="quartier">
                    </div>
                    <div class="col-md-6">
                        <label for="sex" class="form-label">Sex</label>
                        <select name="sex" id="sex" class="form-select" required>
                            <option value="feminin">Feminin</option>
                            <option value="masculin">Masculin</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                        <div class="col-md-6">
                            <label for="naissance" class="form-label">Date de naissance</label>
                        <input type="date" name="date_naissance" class="form-control" id="date_naissance" required>
                        </div>
                        <div class="col-md-6">
                        <label for="ville" class="form-label">Ville</label>
                        <select name="ville" id="ville" class="form-select" required>
                            <option value="douala">Douala</option>
                            <option value="yaounde">Yaounde</option>
                            <option value="edea">Edea</option>
                            <option value="bafoussam">Bafoussam</option>
                            <option value="yaounde">Bertoua</option>
                            <option value="yaounde">Garoua</option>
                            <option value="yaounde">Maroua</option>
                            <option value="yaounde">Ebolowa</option>
                            <option value="yaounde">Ngaoundere</option>
                            <option value="yaounde">Dschang</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="login" class="form-label">Username</label>
                        <input type="text" name="login" class="form-control" id="login" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password"  name="password" class="form-control" minlength="8" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="photo" id="avatar-label" class="form-label">
                            <span>Photo</span>
                            <img src="img/avatar.png" alt="">
                        <input type="file" id="photo" name="photo" hidden="" size=50 class="form-control">
                        </label>
                    </div>
                    <div class="col-md-6">
                            <label for="password" class="form-label">Confirmation de mot de passe</label>
                            <input type="password"  name="password1" class="form-control" minlength="8" required>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center mt-3">
                    <button type="submit" name="inscrire" class="btn btn-warning fw-bold">S'inscrire</button>
                </div>
                <span class="d-flex justify-content-end fw-bold"><var>Vous êtes déja inscrit ?<a href="login.php"> Connectez-vous <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a></var></span>
                </div>
            </form>
        </div> 
    </div>
</section>

<?php include_once 'footer.php'; ?>