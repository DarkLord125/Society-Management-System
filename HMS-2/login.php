<?php 
require_once("Includes/config.php");
require_once("Includes/session.php");

if(isset($_SESSION['logged']))
{
    if ($_SESSION['logged'] == true)
    {
        if ($_SESSION['account']=="admin") {
                header("Location:admin/Dashboard/admin.php");
            }
        elseif ($_SESSION['account']=="member") {
                header("Location:members/Dashboard/member.php");
            }
        elseif ($_SESSION['account']=="staff") {
                header("Location:staff/Dashboard/staff.php");
            }
    }  
    else  {
        header("Location:../login.php");
      }  
}
 
?>
 

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Logo3.jpg"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
    
            <h2 class="text-center">Login Form</h2>
        <p class="text-center">Welcome to HMS</p>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>    
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
               <input class="form-control button" type="submit" name="login" value="Login">
            </div>
            <hr>
            <div class="link login-link text-center"><a href="home/home.php">Back To Home</p>
        </form>
    </div>

</body>
</html>