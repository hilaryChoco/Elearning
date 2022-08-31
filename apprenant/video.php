<?php
session_start();
require '../connection.php';
require_once "../phpmailer/emailSetup.php";


$password = $id = "";
$show = true;
$stud = (int)$_SESSION['user_id'] ;


//how to remove gmail security to send mails with php

if(isset($_POST['btn'])){
    $password = $_POST['code'];

    $count = $db->query("SELECT COUNT(id) as result from meeting where meeting_password = '$password'");

    foreach($count as $key) {
        if($key['result']>0){
            $c = $db->query("SELECT COUNT(*) as result from formations_students
        where id_student = $stud ");

            //verifying if he is part of the course
            foreach($c as $key) {
                if($key['result']>0){
                    $show = false;
                    setcookie("code", $password, time()+1*24*60*60);
                }
            }
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
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #meet{
            width:95%;
            height:70vh;
            border-radius: 10px;
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
    <form class="submodal" action="video.php" method="post">
        <input type="text" name="code" id="code" placeholder="Enter meeting code">
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