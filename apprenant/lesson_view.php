<?php
session_start();
include_once '../connection.php';
    if(isset($_GET['id']) ){
        if($_GET['id']!=""){
            $id = $_GET['id'];
            $n = $db->query("SELECT * FROM cours  WHERE id = '$id' ") or die(print_r($db->errorInfo()));
            
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
    
    <div class="div1">
        <?php foreach($n as $lesson){
                echo "<embed class='embeded' src='../".$lesson['fichiers']."' width='1000px' height='1000px' type=''>";
            }
            ?>
    </div>
</body>
</html>