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
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="member.css">
    <link rel="shortcut icon" href="Logo3.jpg"/>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i><img src="1.png"
                 alt="logo" width="100px" height="100px"></i>
            <span class="logo_name">HMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="member.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard </span>
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
                    <span class="links_name">Home Service</span>
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
                <span class="dashboard">Dashboard (member)</span>
            </div>
           
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name"><?php echo $_SESSION["username"]; ?></span>
                
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total members</div>
                        <?php
                            $con = new mysqli('localhost', 'root', '', 'hms');
                            $sql = "SELECT * FROM member";
                            if ($result=mysqli_query($con,$sql)) {
                                $rowcount=mysqli_num_rows($result);
                                // echo $rowcount; 
                            }
                        ?>  
                        <div class="number"><?php echo $rowcount ?></div>

                    </div>
                    <i class='bx bxs-user icon member'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Staff</div>
                        <?php
                            $con = new mysqli('localhost', 'root', '', 'hms');
                            $sql = "SELECT * FROM staff";
                            if ($result=mysqli_query($con,$sql)) {
                                $rowcount=mysqli_num_rows($result);
                                // echo $rowcount; 
                            }
                        ?> 
                        <div class="number"><?php echo $rowcount ?></div>

                    </div>
                    <i class='bx bxs-user-circle  icon staff'></i>
                </div>
                
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Unpaid Bills</div>
                        <?php
                            $con = new mysqli('localhost', 'root', '', 'hms');
                            $sql = "SELECT * FROM billing where status=0";
                            if ($result=mysqli_query($con,$sql)) {
                                $rowcount=mysqli_num_rows($result);
                                // echo $rowcount; 
                            }
                        ?> 
                        <div class="number"><?php echo $rowcount ?></div>
                    </div>
                    <i class='bx bxs-file icon file'></i>
                </div>
            </div>

            <div class="sales-boxes">
            <div class="registry box">
                    <div class="title">Total Members</div>
                    <div class="registry-details">
                
            <table class="table-striped table-bordered col-md-12" style="border: 1px solid black; border-collapse: collapse; width:90%; margin-bottom: 10px; ">
			<thead style="border: 1px solid black; border-collapse: collapse">
				<tr style="border: 1px solid black; border-collapse: collapse">
					<th class="text-center">#</th>
					<th class="text-center">Email</th>
					<th class="text-center">Username</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					// include ("../../Includes/config.php"); 
 					$member = $con->query("SELECT * FROM member order by username asc");
 					$i = 1;
 					while($row= $member->fetch_assoc()):
				 ?>
				 <tr style="border: 1px solid black; border-collapse: collapse">
				 	<td class="text-center" style="border: 1px solid black; border-collapse: collapse">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td style="border: 1px solid black; border-collapse: collapse">
				 		<?php echo ucwords($row['email']) ?>
				 	</td>
				 	
				 	<td style="border: 1px solid black; border-collapse: collapse">
				 		<?php echo $row['username'] ?>
				 	</td>
				 	<td>
                     </td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
                        
                    </ul>
                    <div class="button">
                        <a href="../Members/index.php">See All</a>
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