<?php
session_start();
require '../connection.php';
require_once "../phpmailer/emailSetup.php";


$password = $id = "";
$exist = true;
$created = "0";
$show = true;
$teacher = (int)$_SESSION['user_id'] ;

$id = (int)$_SESSION['formation_id'];
$email = $_SESSION['email'];

if(isset($_POST['btn'])){
    $password = $_POST['code'];
    $created = $_POST['created'];

    $count = $db->query("SELECT COUNT(id) as result from meeting 
        where meeting_password = '$password' and formation_id=$id ");

    foreach($count as $key) {
        if($key['result']>0){
            $show = false;
        }
    }
}

//function to generate random meeting code
function generateRandomString($length = 10, $hasNumber = true, $hasLowercase = true, $hasUppercase = true): string
{
    $string = '';
    if ($hasNumber)
        $string .= '0123456789';
    if ($hasLowercase)
        $string .= 'abcdefghijklmnopqrstuvwxyz';
    if ($hasUppercase)
        $string .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($x = $string, ceil($length / strlen($x)))), 1, $length);
}

//create unique code for connection
while($exist && $created=="0"){
    $code = generateRandomString(10);
    $count = $db->query("SELECT COUNT(id) as result from meeting where meeting_password = '$code' ");
    foreach ($count as $key) {
        if($key['result']<=0){
            $db->exec("INSERT into meeting (formation_id,meeting_password) values ($id,'$code')");

            //sending code through mail to teacher

            //setting subject of mail
            $mail->Subject = "Wise Decision Meeting Code";
            //Email Body
            $mail->Body = "Utilisez ce code pour acceder a la reunion: ".$code;
            //Add Recipient address
            $mail->addAddress("".$email);
            //Finally send email
            if ($mail->Send()) {
                echo "<script>alert('Le code pour acceder a votre cour par \nvisioconference a ete envoyer avec success\n Verifier votre mail !!!!')</script>";
            }
            else{
                echo "<script>alert('Une Erreur c\'est produit \n verifier que vous etez connectez ou votre mail est juste')</script>";
            }

            setcookie("code", $code, time()+1*24*60*60);

            $stud = $db->query("SELECT * from payment where id_formation = '$id' ");
            foreach ($stud as $key) {
                $stud_id = (int)$key['id_student'];
                $contenu = "Le code pour votre cours par VisioConference est:".$code;
                $links = "video.php";
                $db->exec("INSERT into messages (contenu,receiver,sender,links) values ('$contenu',$stud_id,$teacher,'$links')");
            }

            $created = "1";
            $mail->smtpClose(); 

            $exist = false;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISE TRAINING</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #meet{
            width:95%;
            height:70vh;
            border-radius: 10px;
            margin-left: 20%;
        }
        .modal{
            width: 100%;
            height: 100vh;
            background-color: rgba(0,0,0,0.6);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            position: absolute;
            overflow-y: hidden;
        }
        .submodal{
            width: 60%;
            height: 400px;
            background-color: white;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            border-radius: 7px;
        }
        input{
            width: 70%;
            height: 55px;
            padding-left:20px;
            border-radius: 4px;
            outline: none;
            font-size: 18px;
            border: 1px solid gray;
        }
        button{
            width: 120px;
            height: 55px;
            background-color: #1699c4;
            color: white;
            border-radius: 4px;
            font-size: 20px;
            border: none;
        }
        button:hover{
            cursor: pointer;
            background-color: #0b6988;
        }
    </style>
</head>
<body>
<?php if($show){?>
<div class="modal">
    <form class="submodal" action="test.php" method="post">
        <input type="text" name="code" id="code" placeholder="Entrer le code de la visio">
        <input type="text" name="created" value="<?= $created ?>" hidden>
        <button name="btn">Submit</button>
    </form>
</div>
<?php } ?>

<h1 id="h1" style="color: darkred;display: none;width: 100%;text-align: center;text-transform: uppercase;">Fill IN Correct Meeting Credentials<br/> To Join This Video Class</h1>

<!-- visioconference interface -->
  <div id="meet">

  </div>  

    <script src='https://meet.jit.si/external_api.js'></script>
    <script type="text/javascript">

    var h = document.getElementById('h1');

    if(readCookie('code')){
        h.style.display="none"
        let code = readCookie('code');
        const domain = 'meet.jit.si';
        const options = {
            roomName: code,
            width: 800,
            height: 600,
            parentNode: document.querySelector('#meet')
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    }else{
        h.style.display="block"
    }

    
    //function to read cookie
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    //function to clear cookie
    function eraseCookie(name) {
        createCookie(name,"",-1);
    }

    </script>
</body>
</html>