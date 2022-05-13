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

    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="Logo3.jpg">


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
                <a href="admin.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../Announcement/admin_annou.php">
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
                <span class="dashboard">Dashboard</span>
            </div>
            
            <div class="profile-details">
               
                <span class="admin_name"> <?php echo $_SESSION["username"]; ?></span>
                
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
                        <div class="box-topic">Society fund</div>
                        <?php
                            $con = new mysqli('localhost', 'root', '', 'hms');
                            $query="select SUM(amount_payed) as `societyfund` from billing";
                            $res=mysqli_query($con, $query);
                            $data=mysqli_fetch_array($res);
                        ?> 
                        <div class="number"><?php echo $data['societyfund'] ?></div>

                    </div>
                    <i class='bx bx-money icon money'></i>
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
                    <div class="title">Registry</div>
                    <div class="registry-details">
                    <table class="table-striped table-bordered col-md-12" cellspacing="15" style="border: 1px solid black; border-collapse: collapse; ">
			<thead style="border: 1px solid black; border-collapse: collapse">
				<tr style="border: 1px solid black; border-collapse: collapse">
					<th class="text-center">#</th>
					<th class="text-center">In Time</th>
                    <th class="text-center">Person Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					// include ("../../Includes/config.php"); 
 					$registry = $con->query("SELECT * FROM registry order by person_name asc");
 					$i = 1;
 					while($row= $registry->fetch_assoc()):
				 ?>
				 <tr cellspacing="15" style="border: 1px solid black; border-collapse: collapse; padding:10px">
				 	<td class="text-center" style="border: 1px solid black; border-collapse: collapse" style="padding:10px">
				 		<?php echo $i++ ?>
				 	</td>
				 	<td style="border: 1px solid black; border-collapse: collapse" style="padding:10px">
				 		<?php echo ucwords($row['created_at']) ?>
				 	</td>
				 	
				 	<td style="border: 1px solid black; border-collapse: collapse"style="padding:10px">
				 		<?php echo $row['person_name'] ?>
				 	</td>
				 	<td>
                     </td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
                    </div>
                </div>
                <div class="members box">
                    <div class="title">Total Members</div>
                    <ul class="top-sales-details">
                        <!-- <li>
                            <a href="#">
                                
                                <span class="product">Sham</span>
                            </a>
                            <span class="price">A101</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">diksha</span>
                            </a>
                            <span class="price">A102</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">roham</span>
                            </a>
                            <span class="price">A201</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">Piyush</span>
                            </a>
                            <span class="price">A202</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">anup</span>
                            </a>
                            <span class="price">A301</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">vinita</span>
                            </a>
                            <span class="price">A302</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">Ashneer</span>
                            </a>
                            <span class="price">A401</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">Gazal</span>
                            </a>
                            <span class="price">A402</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">Namita</span>
                            </a>
                            <span class="price">A501</span>
                        </li>
                        <li>
                            <a href="#">
                                
                                <span class="product">Namita</span>
                            </a>
                            <span class="price">A501</span>
                        </li> -->
                        <table class="table-striped table-bordered col-md-12" style="border: 1px solid black; border-collapse: collapse">
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