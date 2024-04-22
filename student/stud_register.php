<?php

include '../connection/config.php';
error_reporting(0);

session_start();
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Register - OJT Web Portal</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Page-2.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 2rem;
            background: url(./images/login_bg.jpg);
            height: 94vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
  <body>
    <section class="u-clearfix u-section-1" id="sec-113a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-3 u-border-grey-75 u-container-style u-group u-radius-17 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <img class="u-expanded-width u-image u-image-1" src="images/image-1.png" data-image-width="711" data-image-height="231">
            <div class="u-form u-form-1">
            <form action="../php/stud_registerCode.php" method="POST" enctype="multipart/form-data" class="u-clearfix u-form-spacing-20 u-form-vertical u-inner-form" style="padding: 10px">
                <div class="u-form-group u-form-name u-form-partition-factor-3 u-label-none">
                  <label for="name-3b9a" class="u-label">First Name</label>
                  <input type="text" placeholder="First Name" id="name-3b9a" name="f_name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-1" required="true">
                </div>
                <div class="u-form-email u-form-group u-form-partition-factor-3 u-label-none">
                  <label for="email-3b9a" class="u-label">Middle Name</label>
                  <input type="text" placeholder="Middle Name" id="email-3b9a" name="m_name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-2" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-3">
                  <label for="text-743c" class="u-label">Last</label>
                  <input type="text" placeholder="Last Name" id="text-743c" name="l_name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-3" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-4 u-label-none u-form-group-4">
                  <label for="text-7a3c" class="u-label">Student ID</label>
                  <input type="text" placeholder="Student ID" id="text-7a3c" name="student_id" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-4" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-4 u-label-none u-form-group-4">
                  <label for="select-f65c" class="u-label">Department</label>
                  <div class="u-form-select-wrapper">
                    <select id="select-f65c" name="student_dept" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-5" required="true">
                      <option value="">Department</option>
                      <option value="College of Engineering">College of Engineering</option>
                      <option value="College of Education">College of Education</option>
                      <option value="College of Arts">College of Arts</option>
                      <option value="College of Science">College of Science</option>
                    </select>
                  </div>
                </div>
                <div class="u-form-group u-form-partition-factor-4 u-form-select u-label-none u-form-group-5">
                  <label for="select-f65c" class="u-label">Course</label>
                  <div class="u-form-select-wrapper">
                    <select id="select-f65c" name="student_course" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-5" required="true">
                      <option value="">Course</option>
                    </select>
                    </div>
                </div>
                <div class="u-form-group u-form-partition-factor-4 u-label-none u-form-group-6">
                  <label for="text-bb89" class="u-label">Section</label>
                  <input type="text" placeholder="Section" id="text-bb89" name="student_section" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-6" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-7">
                  <label for="text-63ba" class="u-label">Address</label>
                  <input type="text" placeholder="Address" id="text-63ba" name="C_address" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-7" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-8">
                  <label for="text-124c" class="u-label">Gender</label>
                  <input type="text" placeholder="Gender" id="text-124c" name="gender" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-8" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-9">
                  <label for="text-fd88" class="u-label">Phone Number</label>
                  <input type="number" placeholder="Contact Number" id="text-fd88" name="cpNum" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-9" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-10">
                  <label for="text-da7f" class="u-label">Email</label>
                  <input type="text" placeholder="Email" id="text-da7f" name="eMail" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-10" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-11">
                  <label for="text-16c0" class="u-label">Password</label>
                  <input type="password" placeholder="Password" id="text-16c0" name="pword" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-11" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-3 u-label-none u-form-group-12">
                  <label for="text-5809" class="u-label">Repeat Password</label>
                  <input type="password" placeholder="Repeat Password" id="text-5809" name="cpword" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-12" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-label-none u-form-group-13">
                  <label for="text-13e6" class="u-label">Guardians Name</label>
                  <input type="text" placeholder="Guardians Name" id="text-13e6" name="guardians_name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-13" required="true">
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-label-none u-form-group-14">
                  <label for="text-df1c" class="u-label">Guardians Phone Number</label>
                  <input type="number" placeholder="Guardians Phone Number" id="text-df1c" name="guardians_cpNumber" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-14" required="true">
                </div>
                <div class="u-form-group u-label-none u-form-group-15">
                  <label for="text-1c0f" class="u-label">Select Image</label>
                  <input type="file" accept="image/*" placeholder="Image File" id="text-1c0f" name="stud_pic" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-15" required="true">
                </div>
                <br>
                <div class="u-align-center u-form-group u-form-submit">
                <button name="register" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-grey-70 u-hover-palette-1-dark-1 u-radius-28 u-btn-1">Register</button>
                </div>
                
              </form>
              <br>
            </div>
            <p class="u-text u-text-default u-text-1">Do you have an account ? <a href="index.php"> Login</a></p>
          </div>
        </div>
      </div>
    </section>

    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>

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
  
  <script>
$(document).ready(function() {
    $('#select-f65c').change(function() {
        var selectedDepartment = $(this).val();
        var courseSelect = $('select[name="student_course"]');

        // Clear the course options
        courseSelect.empty();

        // Add a default option
        courseSelect.append('<option value="">Course</option>');

        if (selectedDepartment === 'College of Education') {
            courseSelect.append('<option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>');
            courseSelect.append('<option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in English minor in Mandarin">Bachelor of Secondary Education Major in English minor in Mandarin</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in Sciences">Bachelor of Secondary Education Major in Sciences</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>');
            courseSelect.append('<option value="Bachelor of Secondary Education Major in Values Education">Bachelor of Secondary Education Major in Values Education</option>');
            courseSelect.append('<option value="Bachelor of Physical Education">Bachelor of Physical Education</option>');
            courseSelect.append('<option value="Bachelor of Technology and Livelihood Education Major in Industrial Arts">Bachelor of Technology and Livelihood Education Major in Industrial Arts</option>');
            courseSelect.append('<option value="Bachelor of Technology and Livelihood Education Major in Information and Communication Technology">Bachelor of Technology and Livelihood Education Major in Information and Communication Technology</option>');
            courseSelect.append('<option value="Bachelor of Technology and Livelihood Education Major in Home Economics">Bachelor of Technology and Livelihood Education Major in Home Economics</option>');
        } else if (selectedDepartment === 'College of Engineering') {
            courseSelect.append('<option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Manufacturing Engineering">Bachelor of Science in Manufacturing Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>');
            courseSelect.append('<option value="Bachelor of Science in Mechatronics Engineering">Bachelor of Science in Mechatronics Engineering</option>');
        } else if (selectedDepartment === 'College of Science') {
            courseSelect.append('<option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>');
            courseSelect.append('<option value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>');
            courseSelect.append('<option value="Bachelor of Science in Math with Specialization in Computer Science">Bachelor of Science in Math with Specialization in Computer Science</option>');
            courseSelect.append('<option value="Bachelor of Science in Math with Specialization in Applied Statistics">Bachelor of Science in Math with Specialization in Applied Statistics</option>');
            courseSelect.append('<option value="Bachelor of Science in Math with Specialization in Business Applications">Bachelor of Science in Math with Specialization in Business Applications</option>');
        } else if (selectedDepartment === 'College of Arts') {
            courseSelect.append('<option value="Bachelor of Arts in Broadcasting">Bachelor of Arts in Broadcasting</option>');
            courseSelect.append('<option value="Bachelor of Arts in Journalism">Bachelor of Arts in Journalism</option>');
            courseSelect.append('<option value="Bachelor of Performing Arts (Theater Track)">Bachelor of Performing Arts (Theater Track)</option>');
            courseSelect.append('<option value="Batsilyer ng Sining sa Malikhaing Pagsulat">Batsilyer ng Sining sa Malikhaing Pagsulat</option>');
        } else {
        }
    });
});
</script>

</body></html>