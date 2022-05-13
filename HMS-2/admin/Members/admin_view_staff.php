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

    <link rel="stylesheet" href="admin_view_mem.css">
    <link rel="shortcut icon" href="Logo3.jpg">

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
                <a href="../Announcement/admin_annou.php" >
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
                <a href="admin_view_mem.php" class="active">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>

            <li>
                <a href="#">
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
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
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
                <span class="Announcement">Staff</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                
                <span class="admin_name"><?php echo $_SESSION["username"]; ?></span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <div class="home-content">
            <div class="type_select">
                <a href="admin_view_mem.php" >
                    <div class="typebut"> Members</div>
                </a>
                <a href="admin_view_staff.php" class="active">
                    <div class="typebut"> Staff</div>
                </a>
                
            </div>
            <div class="member_list">
                <div class="mem_card">
                    <div class="flatowner">Person1</div>
                    <div class="flat">Secretary</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
                <div class="mem_card">
                    <div class="flatowner">Person2</div>
                    <div class="flat">Treasurer</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                
                <br>
                
                <div class="mem_card">
                    <div class="flatowner">Watchmen1</div>
                    <div class="flat">Watchmen</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>

                <div class="mem_card">
                    <div class="flatowner">Watchmen2</div>
                    <div class="flat">Watchmen</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
                <div class="mem_card">
                    <div class="flatowner">Watchmen3</div>
                    <div class="flat">Watchmen</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
                <div class="mem_card">
                    <div class="flatowner">Cleaner1</div>
                    <div class="flat">Cleaner</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
                <div class="mem_card">
                    <div class="flatowner">Cleaner2</div>
                    <div class="flat">Cleaner</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
                <div class="mem_card">
                    <div class="flatowner">Cleaner3</div>
                    <div class="flat">Cleaner</div>
                    <div class="contact">
                        <i class="bx bx-phone-call"></i>
                        <span>+91-1234567879</span>
                    </div>
                </div>
                <br>
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