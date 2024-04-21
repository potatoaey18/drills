<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="dashboard.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>OJT Web Portal</span></a></div>
                    <li class="label">Main</li>
                    <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard </a></li>

                    <li class="label">Apps</li>
                    <li><a href="classLIST.php"><i class="ti-user"></i>Class List </a></li>
                    <li><a href="students_ojt_requirements.php"><i class="ti-folder"></i>Students OJT Requirements </a></li>
                    <li><a href="students_DTR.php"><i class="ti-alarm-clock"></i>Students DTR </a></li>
                    <li><a href="students_task_record.php"><i class="ti-list"></i>Students Task Record </a></li>
                    <li><a href="students_narrativeReport.php"><i class="ti-files"></i> Student Journal </a></li>
                    <li><a href="partner_companies.php"><i class="ti-layout-width-default"></i> Partner Companies </a></li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-comment-alt"></i> Chats <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="coordinators_message.php">Chat Students</a></li>
                            <li><a href="chat_supervisor.php">Chat HTE Coordinator</a></li>
                            <li><a href="chat_admin.php">Chat SIP Coordinator</a></li>

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
                                        if(isset($_SESSION['auth_user']['coordinators_id'])) {
                                            $studID = $_SESSION['auth_user']['coordinators_id'];
                                            $unread = 'Unread';

                                            // Adjust your SQL query based on your database schema
                                            $stmt = $conn->prepare("SELECT COUNT(*) AS total_unread FROM coordinatorsystemnotification WHERE coordinator_id = ? AND status = ?");
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
                                        if(isset($_SESSION['auth_user']['coordinators_id'])) {
                                            $coordinatorID = $_SESSION['auth_user']['coordinators_id'];
                                            
                                            // Adjust your SQL query based on your database schema
                                            $stmt = $conn->prepare("SELECT * FROM coordinatorsystemnotification LEFT JOIN coordinators_account ON coordinators_account.id = coordinatorsystemnotification.coordinator_id WHERE coordinatorsystemnotification.coordinator_id = ? ORDER BY coordinatorsystemnotification.id DESC");
                                            $stmt->execute([$coordinatorID]);
                                            $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach ($notifications as $notification) {
                                        ?>
                                                <li>
                                                    <a href="#">
                                                        <img class="pull-left m-r-10 avatar-img" src="<?php echo $notification['coordinators_profile_picture']; ?>" alt="" />
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
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                            <?php
                                if(isset($_SESSION['auth_user']['coordinators_id'])) {
                                    $coordinatorID = $_SESSION['auth_user']['coordinators_id'];

                                    // Adjust your SQL query based on your database schema
                                    $stmt = $conn->prepare("SELECT * FROM coordinators_account WHERE id = ? ");
                                    $stmt->execute([$coordinatorID]);
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
                url: "mark_coordinator_notifications_as_read.php", // Replace with the correct URL
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

<script>
  function profile() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'coordinators_profile.php ';
  }
  function settings() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'coordinators_settings.php ';
  }
  function logout() {
    // Reload the page with a query parameter to indicate the selected user
    window.location.href = 'coordinators_logout.php ';
  }
</script>
