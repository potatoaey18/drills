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


    <div class="content-wrap" style="height: 80%; width: 100%;margin: 0 auto;">
        <div style="background-color: white; margin-top: 6rem; margin-left: 16rem; padding: 2rem;">
            <div>
                <div>
                    <div>
                        <div class="page-header">
                            <div class="page-title">
                                <h1 style="font-size: 16px;"><b>HOME</b></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <!-- Slideshow container -->
                     <br><br>
                     <div class="slideshow-container" style="position: relative;">
                        <div class="mySlides fade" style="position: relative;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #700000; opacity: 0.5; z-index: 1; border-radius: 40px;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #FABC3F; font-size: 48px; z-index: 2; text-align: center; font-family: 'Source Serif 4', serif">
                                Iskolar ng Bayan!
                            </div>
                            <img src="images/pup-carousel.jpg" style="height: 50%; width: 100%; position: relative; z-index: 0; border-radius: 40px;">
                        </div>

                        <div class="mySlides fade" style="position: relative;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #700000; opacity: 0.5; z-index: 1; border-radius: 40px;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #FABC3F; font-size: 48px; z-index: 2; text-align: center; font-family: 'Source Serif 4', serif">
                                Iskolar ng Bayan!
                            </div>
                            <img src="images/pup-carousel.jpg" style="height: 50%; width: 100%; position: relative; z-index: 0; border-radius: 40px;">
                        </div>

                        <div class="mySlides fade" style="position: relative;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #700000; opacity: 0.5; z-index: 1; border-radius: 40px;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #FABC3F; font-size: 48px; z-index: 2; text-align: center; font-family: 'Source Serif 4', serif">
                                Iskolar ng Bayan!
                            </div>
                            <img src="images/pup-carousel.jpg" style="height: 50%; width: 100%; position: relative; z-index: 0; border-radius: 40px;">
                        </div>
                        
                        <!-- Dots below the center of the image -->
                        <div style="position: absolute; bottom: 10%; left: 50%; transform: translateX(-50%); text-align: center;">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>

                    <br><br>

                    <div class="page-title">
                                <h1 style="font-size: 16px; color: #700000; margin-left: 5rem;"><b>DASHBOARD</b></h1>
                    </div>
                        <br><br>

                    <div class="row dashboard"> 


                        <div>
                            <div>
                                <div class="dashboard-content">
                                    <div>
                                        <img src="images/alarm.png" alt="">
                                    </div>
                                    <div>
                                        <div>Total Hours</div>
                                        <?php

                                        $stmt = $conn->prepare("SELECT * FROM ojt_hours");
                                        $stmt->execute();
                                        
                                        $count = $stmt->fetch(PDO::FETCH_ASSOC);
                                        ?>

                                        <div class="stat"><?php echo $count['total_hours']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div>
                                <div class="dashboard-content">
                                    <div>
                                    <img src="images/user.png" alt="">
                                    </div>
                                    <div>
                                        <div>Hours Left</div>
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

                                        <div class="stat"><?php echo $hoursLEFT; ?> Hrs</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div>
                                <div class="dashboard-content">
                                    <div>
                                        <img src="images/done.png" alt="">
                                    </div>
                                    <div>
                                        <div>Completed Task</div>
                                        <?php
                                        $studID = $_SESSION['auth_user']['student_id'];
                                        $taskSTATUS = 'Finished';

                                        $stmt = $conn->prepare("SELECT COUNT(*) FROM stud_task_list WHERE stud_id = ? AND task_status = ?");
                                        $stmt->execute([$studID, $taskSTATUS]);
                                        
                                        $count = $stmt->fetchColumn(); // Fetch the count
                                        ?>

                                        <div class="stat"><?php echo $count; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div>
                                <div class="dashboard-content">
                                    <div>
                                        <img src="images/pending.png" alt="" >
                                        <div>
                                            <div>Pending Task</div>

                                            <?php
                                            $studID = $_SESSION['auth_user']['student_id'];
                                            $taskSTATUS = 'Pending';

                                            $stmt = $conn->prepare("SELECT COUNT(*) FROM stud_task_list WHERE stud_id = ? AND task_status = ?");
                                            $stmt->execute([$studID, $taskSTATUS]);
                                            
                                            $count = $stmt->fetchColumn(); // Fetch the count
                                            ?>

                                        <div class="stat"><?php echo $count; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    <br><br>
                <div class="page-title" style="display: flex; align-items: center; margin-left: 5rem;">
                        <img src="images/faqs.png" alt="faqs" style="margin-right: 10px;">
                        <h1 style="font-size: 16px; color: #700000; margin: 0;"><b>FAQs</b></h1>
                    </div>


                    <div class="faq-container">
                        <div class="faq-item">
                            <div class="faq-header">How do I apply for OJT, and what are the requirements?<span>v</span></div>
                                <div class="faq-content">
                                    To apply for OJT, you must first ensure that you have completed the required number of academic units specified by your department. The OJT office will typically guide you through the application process, which includes submitting your OJT application form, résumé, and other documents. Some departments may require additional requirements such as a pre-approval from your professors or a departmental orientation.
                                </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-header">What types of companies or organizations offer OJT opportunities?<span>v</span></div>
                                <div class="faq-content">
                                    PUP partners with a variety of companies and organizations across different sectors, including but not limited to business, engineering, information technology, marketing, and government agencies. You may be assigned to local businesses, multinational corporations, non-governmental organizations (NGOs), or government offices that align with your course of study.                        </div>
                                </div>
                        <div class="faq-item">
                            <div class="faq-header"> How is the OJT performance evaluated, and what is expected from me?<span>v</span></div>
                            <div class="faq-content">
                                During your OJT, your performance will be evaluated based on the tasks you perform, your punctuality, and your overall attitude towards work. Your OJT supervisor at the company will provide feedback, and PUP faculty members may visit or communicate with your supervisor for progress updates. You will also need to submit a report or final project summarizing your experience, which will be assessed as part of your OJT grade.                        </div>
                            </div>
                    </div>
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
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 45,
                    callback: function(value, index, values) {
                        // Change font size based on window width
                        var fontSize = window.innerWidth < 512 ? 10 : 14;
                        return Chart.helpers.isArray(value) ? value.join(' ') : value;
                    }
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

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

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        
        // Hide all slides
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        // Increment slideIndex, reset if it's greater than the number of slides
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        
        // Display the current slide and update the active dot
        slides[slideIndex - 1].style.display = "block";
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        dots[slideIndex - 1].className += " active";
        
        setTimeout(showSlides, 3000); 
    }

    // Next/previous controls
    function plusSlides(n) {
        slideIndex += n - 1; // Adjust index to prevent skipping slides
        showSlides();
    }

    // Thumbnail image controls
    function currentSlide(n) {
        slideIndex = n - 1; // Adjust for 0-based index
        showSlides();
    }

    setInterval(showSlides, 3000);
</script>

<script>
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
      const header = item.querySelector('.faq-header');
      header.addEventListener('click', () => {
        item.classList.toggle('active');
      });
    });
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

<style>
    * {box-sizing:border-box}
    ``
    /* Slideshow container */
    .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
    display: none;
    }

    /* Next & previous buttons */
    .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    }
    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 10px;
    width: 10px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .fade {
    animation-name: fade;
    animation-duration: 1.5s;
    }

    @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
    }

    .faq-container {
      max-width: 1000px;
      margin: 0 auto;
    }

    .faq-item {
      background-color: white;
      margin: 20px 0;
      border-radius: 5px;
      overflow: hidden;
      transition: all 0.8s ease;
    }

.faq-header {
  padding: 15px;
  cursor: pointer;
  font-size: 18px;
  font-weight: bold;
  background-color: rgb(104, 104, 104);
  color: white;
  display: flex;
  justify-content: space-between; /* Aligns items to opposite ends */
  align-items: center; /* Vertically aligns the items in the middle */
  transition: background-color 0.3s ease;
}

.faq-header:hover {
  background-color: rgb(152, 152, 152);
  color: #000;
}

.faq-header span {
  font-size: 24px; /* Adjust the size of the arrow */
  font-weight: 200;
  transition: transform 0.3s ease; /* Smooth transition for rotation */
}

.faq-item.active .faq-header span {
  transform: rotate(180deg); /* Rotate the arrow when expanded */
}

.faq-content {
      padding: 15px;
      display: block;
      background-color: rgb(255, 255, 255);
      font-size: 16px;
      color: #000;
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      transition: max-height 0.8s ease, opacity 0.8s ease;
    }

.faq-item.active .faq-content {
      max-height: 1000px; /* Adjust this value if needed */
      opacity: 1;
    }


.dashboard {
    max-width: 62.5rem;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center; 
    gap: 100px;
}

.dashboard-content {
    min-width: 150px;
    min-height: 150px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.dashboard-content img {
    height: 50px;
    display: block;
    margin: 0 auto;
}


.dashboard > :nth-child(1) {
    border: 3px solid #0054B2; /* First child border */
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.8); /* Shadow on right and bottom */
}

.dashboard > :nth-child(2) {
    border: 3px solid #DA7700; 
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.8); /* Shadow on right and bottom */
}

.dashboard > :nth-child(3) {
    border: 3px solid #EAE100; 
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.8); /* Shadow on right and bottom */
}

.dashboard > :nth-child(4) {
    border: 3px solid #419D00; 
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.8); /* Shadow on right and bottom */
}

.stat {
    align-self: center;
    justify-self: center;
}
</style>