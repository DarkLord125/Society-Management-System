<?php 
  require_once("../../Includes/config.php"); 
  require_once("../../Includes/session.php"); 
  if ($logged==false) {
       header("Location:../../login.php");
  }
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="member_neigh.css">
    <link rel="shortcut icon" href="Logo3.jpg">


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i><img src="1.png" alt="logo" width="100px" height="100px"></i>
            <span class="logo_name">HMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../Dashboard/member.php" >
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../Announcement/member_annou.php">
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
                <a href="../Neighbourhood/member_neigh.php" class="active">
                    <i class='bx bx-map' ></i>
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
                <a href="../Event_calender/member_event.php">
                    <i class='bx bx-calendar-event'></i>
                    <span class="links_name">Events</span>
                </a>
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
                <span class="neighbourhood">Neighbourhood</span>
            </div>
           
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name"><?php echo $_SESSION["username"]; ?></span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <div class="home-content">
        
            <div class="loca-box">
                <div class="loca-cat">

                    <div class="tittle">Police Station</div>
                    <div class="content" >
                        <div class="inner-content">
    
                            <div class="map-box" >
                                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1496.3102563659031!2d72.89977874554533!3d19.087250262818674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c7cfaaaaaaab%3A0x8ca54201c627f62a!2sGhatkopar%20Police%20Station!5e0!3m2!1sen!2sin!4v1645372837936!5m2!1sen!2sin" 
                                 allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="info-box">
                                <h3>Ghatkopar Police Station</h3>
                                <p>Lal Bahadur Shastri Rd, 
                                    Chirag Nagar, Ghatkopar West, Mumbai,
                                     Maharashtra 400086</p>
                                <p>Contact: +912225153543</p>
        
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="loca-cat">

                    <div class="tittle">Hospitals</div>
                    <div class="content" >
                        <div class="inner-content">
    
                            <div class="map-box" >
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15081.842968485133!2d72.90005300000003!3d19.08743300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c62ad34684d9%3A0x8824f166044b07e5!2sNulife%20Hospital!5e0!3m2!1sen!2sin!4v1645374777817!5m2!1sen!2sin" 
                                 allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="info-box">
                                <h3>Nulife Hospital</h3>
                                <p>Nulife Hospital
                                    A1, Harekrishna Building, 1st Floor Near Telephone Exchange,
                                     A1, Harekrishna Bldg, Lal Bahadur Shastri Rd, Jivdaya Lane,
                                     Ghatkopar West, Mumbai, Maharashtra 400086</p>
                                <p>Contact: +912225093630</p>
                                
        
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="content" >
                        <div class="inner-content">
    
                            <div class="map-box" >
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7540.977695828477!2d72.89999572805982!3d19.086212393161293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c7a7a74ac869%3A0xf253f2ea7466b26a!2sZynova%20Shalby%20Hospital!5e0!3m2!1sen!2sin!4v1645375376997!5m2!1sen!2sin"
                                  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="info-box">
                                <h3>Zynova Shalby Hospital</h3>
                                <p>Acme Elanza, 1900, 1917,
                                     Ghatkopar West, Maharashtra 400086</p>
                                <p>Contact: +912268900001</p>
        
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                
            </div>
        </div>


        
    </section>

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

</body>

</html>