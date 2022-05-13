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

    <link rel="stylesheet" href="member_event.css">
    <link rel="shortcut icon" href="Logo3.jpg">

    
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
                <a href="../Dashboard/member.php">
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
                <a href="../Neighbourhood/member_neigh.php">
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
                <a href="member_event.php" class="active">
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
                <span class="Announcement">Events</span>
            </div>
            
            <div class="profile-details">

                <span class="admin_name"><?php echo $_SESSION["username"]; ?></span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <div class="home-content">
            <div class="year-box">
                <div class="year">2022</div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">13</div>
                            <div class="event-month">Jan</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Lohri</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">8:00 pm</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">14</div>
                            <div class="event-month">Jan</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Makar Sankranti</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">10:00 am</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">26</div>
                            <div class="event-month">Jan</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Republic Day</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">9:00 am</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">1</div>
                            <div class="event-month">Mar</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Maha Shivratri</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">9:00 pm</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">17</div>
                            <div class="event-month">Mar</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Holika Dahana</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">9:00 pm</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="event">
                    <div class="event-left">
                        <div class="event-day">
                            <div class="event-date">18</div>
                            <div class="event-month">Mar</div>
                        </div>
                    </div>
                    <div class="event-right">
                        <h3 class="event-title">Holi</h3> 
                        <div class="event-time">
                            <i class="bx bxs-time" ></i>
                            <span class="time-text">9:00 am</span>
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