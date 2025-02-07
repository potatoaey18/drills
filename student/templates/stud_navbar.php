<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>OJT Web Portal</span></a></div>
                    <li class="label">Main</li>
                    <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard </a></li>

                    <li class="label">Apps</li>
                    <li><a href="ojt_requirements.php"><i class="ti-folder"></i> OJT Requirements </a></li>
                    <li><a href="partner_companies.php"><i class="ti-layout-width-default"></i>Partner Companies </a></li>
                    <li><a href="daily_time_records.php"><i class="ti-alarm-clock"></i> Daily Time Records </a></li>
                    <li><a href="stud_task_list.php"><i class="ti-files"></i> Task List </a></li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Journal Report <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="narrativeReport.php">Insert Report</a></li>
                            <li><a href="VIEW_narrativeReport.php">View Daily Reports</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-comment-alt"></i> Chats <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="stud_message.php">Chat Students</a></li>
                            <li><a href="coordinator_studMESSAGE.php">Chat OJT Coordinators</a></li>
                            <li><a href="chat_supervisor.php">Chat HTE Coordinators</a></li>
                            <li><a href="chat_admin.php">Chat SIP Coordinators</a></li>
                            

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell">
                                    <span class="badge badge-danger" id="notification-badge">
                                    <?php
                                        if(isset($_SESSION['auth_user']['student_id'])) {
                                            $studID = $_SESSION['auth_user']['student_id'];
                                            $unread = 'Unread';

                                            // Adjust your SQL query based on your database schema
                                            $stmt = $conn->prepare("SELECT COUNT(*) AS total_unread FROM system_notification WHERE student_id = ? AND status = ?");
                                            $stmt->execute([$studID, $unread]);
                                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $totalUnread = $result['total_unread'];

                                            echo $totalUnread;
                                        }
                                    ?>
                                    </span>
                                </i>
                                <div class="drop-down dropdown-menu dropdown-menu-right" style="position: absolute; transform: translate3d(-227px, -3px, 0px); top: 0px; left: 0px; will-change: transform; height: 300px; overflow: auto; border: 1px solid #ccc;">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                        <li class="text-center">
                                                <a href="#" class="more-link" id="markASread"><i class="ti-email"></i> Mark all as read</a>
                                        </li>
                                        <?php
                                        if(isset($_SESSION['auth_user']['student_id'])) {
                                            $studID = $_SESSION['auth_user']['student_id'];
                                            
                                            // Adjust your SQL query based on your database schema
                                            $stmt = $conn->prepare("SELECT * FROM system_notification LEFT JOIN students_data ON students_data.id = system_notification.student_id WHERE system_notification.student_id = ? ORDER BY system_notification.id DESC");
                                            $stmt->execute([$studID]);
                                            $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach ($notifications as $notification) {
                                        ?>
                                                <li>
                                                    <a href="#">
                                                        <img class="pull-left m-r-10 avatar-img" src="<?php echo $notification['profile_picture']; ?>" alt="" />
                                                        <div class="notification-content">
                                                            <small class="notification-timestamp pull-right"><?php echo $notification['logs_time']; ?></small>
                                                            <div class="notification-heading"><?php echo $notification['logs']; ?></div>
                                                            <div class="notification-text"><?php echo $notification['logs_date']; ?> <div class="notification-timestamp pull-right" id="unreadTORead"><?php echo $notification['status']; ?></div> </div>
                                                            
                                                        </div>
                                                    </a>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> -->
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                            <?php
                                if(isset($_SESSION['auth_user']['student_id'])) {
                                    $studID = $_SESSION['auth_user']['student_id'];

                                    // Adjust your SQL query based on your database schema
                                    $stmt = $conn->prepare("SELECT * FROM students_data WHERE id = ? ");
                                    $stmt->execute([$studID]);
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                }
                            ?>
                                <span class="user-avatar"><?php echo $result['first_name'];?> <?php echo $result['last_name'];?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>

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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


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

