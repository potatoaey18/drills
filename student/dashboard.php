<?php
include '../connection/config.php';
//display all errors
error_reporting(E_ALL);
ini_set('display_errors',  1);

session_start();

if($_SESSION['auth_user']['student_id']==0){
    echo"<script>window.location.href='index.php'</script>";
} else {
    // Assuming you have a variable $conn which is your database connection
    $student_id = $_SESSION['auth_user']['student_id'];
    $query = "SELECT first_name FROM students_data WHERE id = :student_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $first_name = isset($result['first_name']) ? $result['first_name'] : "Guest";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>OJT Web Portal: Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="images/Picture1.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body>
<!---------NAVIGATION BAR-------->
<?php
require_once 'templates/stud_navbar.php';
?>
<!---------NAVIGATION BAR ENDS-------->


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span><?php echo htmlspecialchars($first_name); ?></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-alarm-clock color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Hours</div>
                                        <?php

                                        $stmt = $conn->prepare("SELECT * FROM ojt_hours");
                                        $stmt->execute();
                                        
                                        $count = $stmt->fetch(PDO::FETCH_ASSOC);
                                        ?>

                                        <div class="stat-digit"><?php echo $count['total_hours']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Hours Left</div>
                                        <?php

                                        $stmt = $conn->prepare("SELECT * FROM ojt_hours");
                                        $stmt->execute();
                                        
                                        $hours = $stmt->fetch(PDO::FETCH_ASSOC);

                                        // Check if the date exists for the user in the database
                                        $studID = $_SESSION['auth_user']['student_id'];

                                        $stmt = $conn->prepare("SELECT SUM(total_working_hours) AS completed_hours FROM stud_daily_time_records WHERE stud_id = ?");
                                        $stmt->execute([$studID]);
                                        $completedHOURS = $stmt->fetch(PDO::FETCH_ASSOC);  
                                        
                                        $hoursLEFT = $hours['total_hours'] - $completedHOURS['completed_hours'];

                                        ?>

                                        <div class="stat-digit"><?php echo $hoursLEFT; ?> Hrs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-files color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Completed Task</div>
                                        <?php
                                        $studID = $_SESSION['auth_user']['student_id'];
                                        $taskSTATUS = 'Finished';

                                        $stmt = $conn->prepare("SELECT COUNT(*) FROM stud_task_list WHERE stud_id = ? AND task_status = ?");
                                        $stmt->execute([$studID, $taskSTATUS]);
                                        
                                        $count = $stmt->fetchColumn(); // Fetch the count
                                        ?>

                                        <div class="stat-digit"><?php echo $count; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-files color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Pending Task</div>

                                        <?php
                                        $studID = $_SESSION['auth_user']['student_id'];
                                        $taskSTATUS = 'Pending';

                                        $stmt = $conn->prepare("SELECT COUNT(*) FROM stud_task_list WHERE stud_id = ? AND task_status = ?");
                                        $stmt->execute([$studID, $taskSTATUS]);
                                        
                                        $count = $stmt->fetchColumn(); // Fetch the count
                                        ?>

                                        <div class="stat-digit"><?php echo $count; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------CHART-------------->
                    <div class="row">
                        
                    
                    <div class="col-lg-6">
                        <div class="card">
                          <div class="card-title">
                            <h4>Student Weekly Performance </h4>
        
                          </div>
                          <div class="sales-chart">
                            <canvas id="team-chart"></canvas>
                          </div>
                        </div>
                        <!-- /# card -->
                      </div>

                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-title">
                            <h4>Performance Rating per Criteria </h4>
        
                          </div>
                          <div class="sales-chart">
                            <canvas id="barChart"></canvas>
                          </div>
                        </div>
                        <!-- /# card -->
                      </div>
                    
                      </div>


                      <div class="row">
                        
                    
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">
                            <h4>Word Cloud</h4>
                        </div>
                        <div class="sales-chart">
                            <?php
                            $studID = $_SESSION['auth_user']['student_id'];

                            $stmt = $conn->prepare("SELECT comments_suggestions FROM stud_evaluation WHERE stud_id = ?");
                            $stmt->execute([$studID]);

                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            // Get all comments and suggestions into a single string
                            $comments = '';
                            foreach ($rows as $row) {
                                $comments .= $row['comments_suggestions'] . ' ';
                            }

                            // Split the comments into an array of words
                            $words = str_word_count($comments, 1);

                            // Count occurrences of each word
                            $wordCounts = array_count_values($words);

                            // Generate the word cloud
                            foreach ($wordCounts as $word => $count) {
                                $fontSize = $count * 7; // Adjust the multiplier to change font size based on word frequency
                                $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // Generate a random color

                                echo "<span style='font-size: " . $fontSize . "px; color: " . $randomColor . ";'>" . $word . "</span> ";
                            }
                            ?>
                        </div>
                    </div>

                        <!-- /# card -->
                      </div>

                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-title">
                            <h4>Task Completion</h4>
        
                          </div>
                          <div class="sales-chart">
                            <canvas id="singelBarChart"></canvas>
                          </div>
                        </div>
                        <!-- /# card -->
                      </div>
                    
                      </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2024 © BulSU. - <a href="#">Mabuhay</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->


    <script src="js/lib/chart-js/Chart.bundle.js"></script>
    <!-- <script src="js/lib/chart-js/chartjs-init.js"></script> -->

    
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>

    
    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>



    <?php
$studID = $_SESSION['auth_user']['student_id'];

$stmt = $conn->prepare("SELECT * FROM stud_evaluation WHERE stud_id = ?");
$stmt->execute([$studID]);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$weeks = array_map(function($week) {
    return "Week $week";
}, array_column($rows, 'week'));

$totalPoints = array_column($rows, 'total_points');

$JobKnowledge = array_column($rows, 'job_knowledge');

$dependability = array_column($rows, 'dependability');

$communication_skills = array_column($rows, 'communication_skills');

$conduct = array_column($rows, 'conduct');

$initiative_and_creativity = array_column($rows, 'initiative_and_creativity');

$cooperatives_and_relationship = array_column($rows, 'cooperatives_and_relationship');

$attendance_and_punctuality = array_column($rows, 'attendance_and_punctuality');
?>

<script>
    (function($) {
        "use strict";

        // Extract PHP arrays for JavaScript use
        var weekData = <?= json_encode($weeks) ?>;
        var totalPointsData = <?= json_encode($totalPoints) ?>;
        var JobKnowledge = <?= json_encode($JobKnowledge) ?>;
        var dependability = <?= json_encode($dependability) ?>;
        var communication_skills = <?= json_encode($communication_skills) ?>;
        var conduct = <?= json_encode($conduct) ?>;
        var initiative_and_creativity = <?= json_encode($initiative_and_creativity) ?>;
        var cooperatives_and_relationship = <?= json_encode($cooperatives_and_relationship) ?>;
        var attendance_and_punctuality = <?= json_encode($attendance_and_punctuality) ?>;


        //Team chart
        var ctx = document.getElementById("team-chart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: weekData,
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: totalPointsData,
                    label: "Ratings",
                    backgroundColor: 'rgba(0,103,255,.15)',
                    borderColor: 'rgba(0,103,255,0.5)',
                    borderWidth: 3.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(0,103,255,0.5)',
                }, ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });



        //bar chart
	var ctx = document.getElementById( "barChart" );
	//    ctx.height = 200;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: weekData,
			datasets: [
				{
					label: "Job Knowledge",
					data: JobKnowledge,
                    borderColor: "rgba(255, 99, 132, 1)", // Red color
					borderWidth: "0",
					backgroundColor: "rgba(255, 99, 132, 0.5)"
                            },
				{
					label: "Dependability",
					data: dependability,
					borderColor: "rgba(54, 162, 235, 1)", // Blue color
                    borderWidth: "0",
                    backgroundColor: "rgba(54, 162, 235, 0.5)"
                            },
                {
					label: "Communication Skills",
					data: communication_skills,
					borderColor: "rgba(255, 206, 86, 1)", // Yellow color
                    borderWidth: "0",
                    backgroundColor: "rgba(255, 206, 86, 0.5)"
                            },
                {
					label: "Conduct",
					data: conduct,
					borderColor: "rgba(255, 165, 0, 1)", // Orange color
                    borderWidth: "0",
                    backgroundColor: "rgba(255, 165, 0, 0.5)"
                            },
                {
					label: "Initiative & Creativity",
					data: initiative_and_creativity,
					borderColor: "rgba(0, 255, 255, 1)", // Cyan color
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 255, 255, 0.5)"

                            },
                {
					label: "Cooperatives & Relationship",
					data: cooperatives_and_relationship,
					borderColor: "rgba(128, 0, 128, 1)", // Purple color
                    borderWidth: "0",
                    backgroundColor: "rgba(128, 0, 128, 0.5)"


                            },
                {
					label: "Attendance & Punctuality",
					data: attendance_and_punctuality,
					borderColor: "rgba(50, 205, 50, 1)", // Purple color
                    borderWidth: "0",
                    backgroundColor: "rgba(50, 205, 50, 0.5)"


                            }


                        ]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true
					}
                                } ]
			}
		}
	} );

    <?php
$studID = $_SESSION['auth_user']['student_id'];
$taskSTATUS = 'Finished';

$stmt = $conn->prepare("SELECT COUNT(task_status) AS total_task_finished, task_date_of_deployed FROM stud_task_list WHERE stud_id = ? AND task_status = ? GROUP BY task_date_of_deployed");
$stmt->execute([$studID, $taskSTATUS]);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$task_date_of_deployed = array_column($rows, 'task_date_of_deployed');

$total_task_finished = array_column($rows, 'total_task_finished');

?>


        var task_date_of_deployed = <?= json_encode($task_date_of_deployed) ?>;
        var total_task_finished = <?= json_encode($total_task_finished) ?>;

    // single bar chart
	var ctx = document.getElementById( "singelBarChart" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: task_date_of_deployed,
			datasets: [
				{
                    label: "Total Task Finished",
					data: total_task_finished,
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true
					}
                                } ]
			}
		}
	} );


    

    })(jQuery);
</script>



    <?php 
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

?>
    <script>
    sweetAlert("<?php echo $_SESSION['alert']; ?>", "<?php echo $_SESSION['status']; ?>", "<?php echo $_SESSION['status-code']; ?>");
    </script>
<?php
unset($_SESSION['status']);
}
?>

</body>

</html>
