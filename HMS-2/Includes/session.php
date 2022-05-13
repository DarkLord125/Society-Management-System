<!-- email = email i.e one and the same thing -->
<!-- convert to mysqli -->
<?php  
    require_once("config.php");
    session_start();
    $logged = false;
    //checking if anyone(admin/email)is logged in or not
    if(isset($_SESSION['logged']))
    {
        if ($_SESSION['logged'] == true)
        {
            $logged = true ;
            $username = $_SESSION['username'];
        }
    }
    else
        $logged=false;

    if($logged != true)
    {
        $username = "";
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $username =$_POST['username'];
            $password=$_POST['password'];            
            // some prereq-safeguards for the purpose of DB searching ->
            $username = stripslashes($username);
            $username = mysqli_real_escape_string($con,$username);
            $password = stripslashes($password);
            $password = mysqli_real_escape_string($con,$password);
            
            //DB HAS 2 TABLES ADMIN AND USER BOTH HAVING THEIR OWN ATTRIBUTES
            //EMAIL AND PASSWORD      
            // member      
            $sql = "SELECT * FROM member WHERE username ='$username' AND password ='$password' ";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['member'] = $row['name'];
                $_SESSION['logged']=true;
                $_SESSION['uid']=$row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['account']="member";
                header("Location:members/Dashboard/member.php");
            }  
            // admin
            $sql = "SELECT * FROM admin WHERE username='$username' AND password ='$password' ";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['username'] = $username;
                $_SESSION['aid']=$row['id'];
                $_SESSION['account']="admin";
                header("Location:admin/Dashboard/admin.php");
            }
            // staff
            $sql = "SELECT * FROM staff WHERE username='$username' AND password ='$password' ";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['username'] = $username;
                $_SESSION['aid']=$row['id'];
                $_SESSION['account']="staff";
                header("Location:staff/Dashboard/staff.php");
            }

        }
    }
?>