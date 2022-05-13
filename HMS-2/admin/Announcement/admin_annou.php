<?php 
  require_once("../../Includes/config.php"); 
  require_once("../../Includes/session.php"); 
  if ($logged==false) {
       header("Location:../../login.php");
  }
  require_once("Connection.php");
  $connection = new Connection();
$announcements= $connection ->getannouncements();


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="admin_annou.css">
    <link rel="shortcut icon" href="Logo3.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        vard = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
    </script>
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i><img src="1.png" alt="logo" width="80px" height="80px"></i>
            <span class="logo_name">HMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../Dashboard/admin.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin_annou.php" class="active">
                    <i class='bx bx-bell'></i>
                    <span class="links_name">Announcement</span>
                </a>
            </li>
            <li>
                <a href="../Bill/index.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Maintainence Bill</span>
                </a>
            </li>
            <li>
                <a href="../Home_Services/home_ser.php">
                    <i class='bx bxs-user-circle'></i>
                    <span class="links_name">Home Services</span>
                </a>
            </li>
            <li>
                <a href="../Neighbourhood/admin_neigh.php">
                    <i class='bx bx-map'></i>
                    <span class="links_name">Neighbourhood</span>
                </a>
            </li>
            <li>
                <a href="../Members/index.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Members</span>
                </a>
            </li>

            <li>
                <a href="../Members/staff/index.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Staff</span>
                </a>
            </li>

            <li>
                <a href="https://discord.gg/ytmJWCjyHZ" target="_blank">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Chat Box</span>
                </a>
            </li>
            <li>
                <a href="../Event_calender/admin_event.php">
                    <i class='bx bx-calendar-event'></i>
                    <span class="links_name">Events</span>
                </a>
            </li>
            </li>
            <li class="log_out">
                <a href="../../logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="Announcement">Announcement</span>
            </div>
            
            <div class="profile-details">
                
                <span class="admin_name"><?php echo $_SESSION["username"]; ?></span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <div class="home-content">
            <div class="content-box">
                <div class="day" id="add-day">
                    <div class="title"><span id="datetime"></span></div>
                    <a href="#modalDialog" class="add-announce" id="mbtn" >
                        
                        <div class="add-announce-box">
                            Add Announcement
                        </div>
                    </a>

                </div><br>
                <?php foreach ($announcements as $announcement): ?>
                <div class="day">
                    <div class="title"><?php echo $announcement['created_at']?></div>
                    <div class="announce">
                        <div class="annou-title"><?php echo $announcement['announcement_subject']?></div>
                        <?php echo $announcement['announcement_text']?>
                    </div>
                    <br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </section>

    
    <link rel="stylesheet" href="style.css">
    <div id="modalDialog" class="modal">
        <div class="modal-content animate-top">
            <div class="modal-header">
                <h5 class="modal-title">Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" id="contactFrm" action="create.php">
            <div class="modal-body">
                <!-- Form submission status -->
                <div class="response"></div>
                
                <!-- Contact form -->
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter the Title" required="">
                </div>
                <div class="form-group">
                    <label>Message:</label>
                    <textarea name="message" name="message" id="title" class="form-control" placeholder="Your message here" rows="6"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Submit button -->
                <button type="submit" name="submit" id="subject" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- <?php
require_once("../../Includes/config.php");
if(isset($_POST["submit"])){

    $name = $_POST['name'];
    $message = $_POST['message'];

    $insertquery = " insert into announcement(announcement_subject,announcement_text) values('$name','$message')";

    mysqli_query($con,$insertquery);

}

?> -->

<!-- <script>
function validate(){

  var title = document.getElementById("title").value;
  var subjetc = document.getElementById("subject").value;
  var modalDialog = document.getElementById("modalDialog");
  
  var text;
  if(title.length < 10){
    alert("Please Enter Correct Subject");
    modalDialog.innerHTML = text;
    return FormData;
  }
  if(subject.length <= 140){
    alert("Please Enter More Than 140 Characters");
    modalDialog.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}
</script> -->




<script>
/*
 * Modal popup
 */
// Get the modal
var modal = $('#modalDialog');

// Get the button that opens the modal
var btn = $("#mbtn");

// Get the  element that closes the modal
var span = $(".close");

$(document).ready(function(){
    // When the user clicks the button, open the modal 
    btn.on('click', function() {
        modal.show();
    });
    
    // When the user clicks on  (x), close the modal
    span.on('click', function() {
        modal.hide();
    });
});
</script>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

<!-- <?php
$sql = "SELECT  announcement_subject, announcement_text FROM announcement";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " Announcement: " . $row["announcement_subject"]. " " . $row["announcement_text"]. "<br>";
  }
} else {
  echo "0 results";
}
?> -->


</body>

</html>