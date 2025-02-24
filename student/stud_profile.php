<?php

include '../connection/config.php';
//display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if($_SESSION['auth_user']['student_id']==0){
  echo"<script>window.location.href='index.php'</script>";
  
}




//REMOVE SKILLS
if (isset($_POST['removeSKILL'])) {
  $studID = $_SESSION['auth_user']['student_id'];

  $selected_skill = $_POST['selected_skill'];


  $sql = $conn->prepare("DELETE FROM stud_skills WHERE id = ?");
  $sql->execute([$selected_skill]);

  date_default_timezone_set('Asia/Manila');
  $date = date('F / d l / Y');
  $time = date('g:i A');
  $logs = 'You removed a skill on your profile.';

  $sql2 = $conn->prepare("INSERT INTO system_notification(student_id, logs, logs_date, logs_time) VALUES (?, ?, ?, ?)");
  $sql2->execute([$studID, $logs, $date, $time]);

    $_SESSION['alert'] = "Success...";
    $_SESSION['status'] = "Skill Removed";
    $_SESSION['status-code'] = "success";

  
}

//ADD SKILLS
if (isset($_POST['add_skills'])) {
  $studID = $_SESSION['auth_user']['student_id'];

  $skills_NAME = $_POST['skillsNAME'];


  $sql = $conn->prepare("INSERT INTO stud_skills(stud_id, skills_name) VALUES (?, ?)");
  $sql->execute([$studID, $skills_NAME]);

  date_default_timezone_set('Asia/Manila');
  $date = date('F / d l / Y');
  $time = date('g:i A');
  $logs = 'Skill added successfully.';

  $sql2 = $conn->prepare("INSERT INTO system_notification(student_id, logs, logs_date, logs_time) VALUES (?, ?, ?, ?)");
  $sql2->execute([$studID, $logs, $date, $time]);

    $_SESSION['alert'] = "Success...";
    $_SESSION['status'] = "Skill Inserted";
    $_SESSION['status-code'] = "success";

  
}


//UPLOAD PICTURE OR UPDATE PICTURE
if (isset($_POST['upload'])) {
  $studID = $_SESSION['auth_user']['student_id'];

  // Define the directory where you want to save the images
  $uploadDirectory = '../student_file_images/'; // Change this to your desired directory

  // Generate a unique filename for the updated image
  $uniqueFilename = uniqid() . '-' . $_FILES['img_student']['name'];

  // Define the full path to the saved image file
  $imagePath = $uploadDirectory . $uniqueFilename;

  // Retrieve the current image path from the database
  $sql = $conn->prepare("SELECT profile_picture FROM students_data WHERE id = ? ");
  $sql->execute([$studID]);
  $row = $sql->fetch(PDO::FETCH_ASSOC);
  $currentImagePath = $row['profile_picture'];

  // Delete the current image from the file system
  if (file_exists($currentImagePath)) {
      unlink($currentImagePath);
  }

  // Move the updated image to the specified directory
  if (move_uploaded_file($_FILES['img_student']['tmp_name'], $imagePath)) {
      // Image has been successfully updated in the file system

      // Update the database with the new image path
      $sql = $conn->prepare("UPDATE students_data SET profile_picture = ? WHERE id = ?");
      if ($sql->execute([$imagePath, $studID])) {

        date_default_timezone_set('Asia/Manila');
        $date = date('F / d l / Y');
        $time = date('g:i A');
        $logs = 'Profile picture updated successfully.';

        $sql2 = $conn->prepare("INSERT INTO system_notification(student_id, logs, logs_date, logs_time) VALUES (?, ?, ?, ?)");
        $sql2->execute([$studID, $logs, $date, $time]);

          $_SESSION['alert'] = "Success...";
          $_SESSION['status'] = "Image Updated";
          $_SESSION['status-code'] = "success";
      } else {
          $_SESSION['alert'] = "Failed!";
          $_SESSION['status'] = "Database update failed";
          $_SESSION['status-code'] = "error";
      }
  } else {
      $_SESSION['status'] = "Failed to move the uploaded image";
      $_SESSION['status-code'] = "error";
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OJT Web Portal: Student Profile</title>
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

    <!-- Common -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
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
                                <h1 style="font-size: 16px;"><b>MY PROFILE</b></h1>
                            </div>
                        </div>
                    </div>
        <!-- /# row -->
        <section id="main-content">
          <!-- Begin Page Content -->
          <div class="container-fluid">

<!-- Page Heading -->

<div class="container bootstrap snippets bootdey">


<div class="panel-body inf-content">
<div class="row">
  <?php
if(isset($_SESSION['auth_user']['student_id'])){

  $studID = $_SESSION['auth_user']['student_id'];

  $stmt = $conn->prepare("SELECT * FROM students_data WHERE id = ? ");
	$stmt->execute([$studID]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
}
?>

<div class="col-md-4">
<form action="" method="POST" enctype="multipart/form-data">
<img alt="" id="myImage" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="<?php echo $data['profile_picture']; ?>" data-original-title="Usuario">
<br><br>



<label>Update/Upload Image</label>

<input type="file" name="img_student" onchange="previewImage(event)" required accept="image/*"><br><br>

<button name="upload" class="btn btn-primary">Upload</button>


</form>

</div>
<div class="col-md-6">
<strong>Information</strong><br>
<div class="table-responsive">
<table class="table table-user-information">
<tbody>

<tr>    
    <td>
        <strong>
            <span class="ti-user"></span>    
            Full Name                                                
        </strong>
    </td>
    <td class="text-primary">
    <?php echo $data['first_name']; ?> <?php echo $data['middle_name']; ?> <?php echo $data['last_name']; ?>  
    </td>
</tr>

<tr>        
    <td>
        <strong>
            <span class="ti-home"></span> 
            Complete Address                                                
        </strong>
    </td>
    <td class="text-primary">
    <?php echo $data['complete_address']; ?>
    </td>
</tr>

<tr>        
    <td>
        <strong>
            <span class="ti-mobile"></span> 
            Phone Number                                                
        </strong>
    </td>
    <td class="text-primary">
    <?php echo $data['phone_number']; ?>
    </td>
</tr>


<tr>        
    <td>
        <strong>
            <span class="ti-email"></span> 
            Email Address                                                
        </strong>
    </td>
    <td class="text-primary">
    <?php echo $data['stud_email']; ?>
    </td>
</tr>

<tr>        
    <td>
        <strong>
            <span class="ti-files"></span> 
            Skills                                              
        </strong>
    </td>
    <td class="text-primary">
    <?php
if(isset($_SESSION['auth_user']['student_id'])){
    $studID = $_SESSION['auth_user']['student_id'];

    $stmt = $conn->prepare("SELECT * FROM stud_skills WHERE stud_id = ?");
    $stmt->execute([$studID]);

    // Fetch all skills associated with the student
    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($skills)) {
        foreach ($skills as $skill) {
            // Access individual skill attributes within the loop
            $skillName = $skill['skills_name'];

            // Use the skill information as needed
            echo "$skillName<br>";
        }
    } else {
        echo "No skills found for this student.";
    }
}
?>

    <form action="" method="post">
      <input type="text" name="skillsNAME" required>
      <br><br>
      <button name="add_skills" class="btn btn-primary">Add Skills</button>
    </form>
<br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId_<?php echo $_SESSION['auth_user']['student_id']; ?>">
          Remove Skill
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modelId_<?php echo $_SESSION['auth_user']['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Skill</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                    <form action="" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="selectskills"></label>
                            <?php
                                if(isset($_SESSION['auth_user']['student_id'])){
                                    $studID = $_SESSION['auth_user']['student_id'];

                                    $stmt = $conn->prepare("SELECT * FROM stud_skills WHERE stud_id = ?");
                                    $stmt->execute([$studID]);

                                    // Fetch all skills associated with the student
                                    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if (!empty($skills)) {
                                        echo '<select class="form-control" name="selected_skill" id="selectskills">';
                                        echo '<option value="">Select a Skill</option>';
                                        
                                        foreach ($skills as $skill) {
                                            $skillName = $skill['skills_name'];
                                            $skillID = $skill['id'];

                                            echo "<option value='$skillID'>$skillName</option>";
                                        }

                                        echo '</select>';
                                    } else {
                                        echo '<p>No skills found for this student.</p>';
                                    }
                                }
                            ?>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button name="removeSKILL" class="btn btn-danger">Remove</button>
                        </div>
                    </form>
            </div>
          </div>
        </div>
    </td>
</tr>

                                    
</tbody>
</table>
</div>
</div>
</div>
</div>



</div>                                        

</div>
<!-- /.container-fluid -->
          <!-- /# row -->
          
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2024 © -
                  <a href="#">Mabuhay</a>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>



<!----------------UPLOAD OR UPDATE AN IMAGE AND DISPLAYS THE SELECTED IMAGE FIRST BEFORE UPDATING OR UPLOADING--------------->
<script>
    function previewImage(event) {
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById('myImage');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>



    <!-- Common -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>

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