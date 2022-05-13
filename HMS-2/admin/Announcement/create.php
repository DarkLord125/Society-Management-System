<?php
require_once("../../Includes/config.php");
if(isset($_POST["submit"])){

    $name = $_POST['name'];
    $message = $_POST['message'];

    $insertquery = " insert into announcement(announcement_subject,announcement_text) values('$name','$message')";

    mysqli_query($con,$insertquery);
    header("location: admin_annou.php");
exit;

}

?>