<nav class="nav-1">
    <img src="images/pupLogo.png" alt="PUP Logo" class="nav-logo">
    <div class="nav-title-caption-container">
        <div class="nav-title">Polytechnic University of the Philippines-ITECH</div>
    </div>
    <div class="user">
        <div class="header-icon">
            <div class="avatar-trigger" data-toggle="dropdown">
                <?php
                if(isset($_SESSION['auth_user']['student_id'])) {
                    $studID = $_SESSION['auth_user']['student_id'];
                    $stmt = $conn->prepare("SELECT * FROM students_data WHERE id = ? ");
                    $stmt->execute([$studID]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $profileImage = $result['profile_picture'] ? $result['profile_picture'] : 'student\images\profile.png';
                }
                ?>
                
                <div class="user-info">
                <span class="user-name">
                            <?php echo $result['first_name'];?>
                        </span>

                        <span class="schoolID">
                            <?php echo $result['student_ID'];?>
                        </span>
               </div>

               <?php if (isset($profileImage)): ?>
                    <img src="<?php echo $profileImage; ?>" alt="User Avatar" class="avatar-img">
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>

            </div>
            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                <div class="dropdown-content-body">
                    <ul>
                        <li>
                            <a href="#" onclick="profile();">
                                <i class="ti-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="settings();">
                                <i class="ti-settings"></i>
                                <span>Setting</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="logout();">
                                <i class="ti-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>		
</nav>
<div>
        <div>
            <div class="sidenav">
                <ul>
                    <li><a href="dashboard.php"><img src="images/home.png"> Home </a></li>
                    <li><a href="dashboard.php"><img src="images/profile.png"> Profile </a></li>
                    <li><a href="dashboard.php"><img src="images/notification.png"> Notification </a></li>
                    <li><a href="dashboard.php"><img src="images/message.png"> Messages </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach a click event handler to the bell icon
        $("#markASread").on("click", function() {
            // Send an AJAX request to mark notifications as read
            $.ajax({
                url: "mark_notifications_as_read.php", // Replace with the correct URL
                type: "POST",
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Update the notification count
                        notificationCount = 0;
                        notificationRead = 'Read';
                        $("#notification-badge").text(notificationCount);
                        $("#unreadTORead").text(notificationRead);

                        // Update the UI or reload notifications here
                        alert("Notifications marked as read");
                        // You can update the notifications without reloading the page here
                    } else {
                        alert("Failed to mark notifications as read");
                    }
                },
                error: function() {
                    alert("An error occurred while processing the request");
                }
            });
        });
    });
</script>

<!-----------AUTO LOGOUT INACTIVITY--------------->
<script>
    var userId = <?php echo $_SESSION['auth_user']['student_id']; ?>;
    var logoutTimeout;

    // Function to log out the user after 10 minutes of inactivity
    function startLogoutTimer() {
        logoutTimeout = setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: 'update_status_AutoLogOut.php',
                data: { userId: userId },
                success: function (response) {
                    // Handle the response if needed
                    window.location.href = 'index.php';
                },
                error: function (xhr, status, error) {
                    // Handle any errors
                }
            });
        }, 180000); // 3 minutes in milliseconds
    }

    // Reset the timeout on user activity
    function resetLogoutTimer() {
        clearTimeout(logoutTimeout);
        startLogoutTimer();
    }

    // Start the timer when the page loads
    startLogoutTimer();

    // Listen for user activity events (e.g., mousemove or keydown)
    document.addEventListener('mousemove', resetLogoutTimer);
    document.addEventListener('keydown', resetLogoutTimer);
</script>

<script>
  function profile() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'stud_profile.php ';
  }
  function settings() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'stud_settings.php ';
  }
  function logout() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'stud_logout.php ';
  }
</script>

<style>
     .header-icon {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }
    
    .avatar-trigger {
        display: flex;
        align-items: center;
    }
    
    .user-name {
        font-weight: 500;
        color: #000;
    }
    
    .avatar-img {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        object-fit: cover;
    }
    .nav-1 {
            font-family: 'Source Serif 4', serif;
            background: #fff;
            border-bottom: 2px solid rgba(68, 68, 68, 0.66);
            color: #D11010;
            text-align: left;
            align-items: center;
            font-size: 20px;
            font-weight: 400;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            display: flex;
            align-items: left;
            margin-bottom: 20px;
            background-clip: padding-box;
            z-index: 1000;
        }

        .nav-logo {
            height: 50px;
            margin-left: 20px;
        }

        .nav-title-caption-container {
            display: flex;
            margin-left: 20px;
        }

        .nav-title {
            font-size: 24px;
            font-weight: bold;
        }

        .sidenav {
            width: 15%;
            background: #fff;
            border-right: 2px solid rgba(68, 68, 68, 0.66);
            height: 100%;
            top: 0;
            position: fixed; 
            padding-top: 20px;
            padding-right: 20px;
            margin-top: 75px;
            z-index: 1;
        }

        .sidenav img {
            height: 30px;
            margin-right: 10px;
            filter: brightness(0) invert(0);
        }
        .sidenav a {
            padding: 6px 8px 6px 16px;
            margin-top: 10px;
            text-decoration: none;
            font-size: 14px;
            color:rgb(0, 0, 0);
            display: block;
            align-items: center;
            border-top-left-radius: 0px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 0px;
        }

        .sidenav a.active {
            color: #f1f1f1;
            background-color: #700000;
        }

        .sidenav a:hover {
            color: #f1f1f1;
            background-color: #700000;
        }

        .sidenav a:hover img{
            filter: brightness(0) invert(1);
        }

        .user {
            margin-right: 20px;
            margin-left: auto;
        }
        
        .main {
            margin-left: 160px; 
            padding: 0px 10px;
        }   

        .user-info {
            display: flex; 
            flex-direction: column; 
            color: #000; 
            align-items: center; 
            justify-content: center; 
            margin-right: 20px; 
            font-family: 'Arial', sans-serif; 
            font-size: 14px; 
        }

        .user-name {
            margin-bottom: 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }   
</style>