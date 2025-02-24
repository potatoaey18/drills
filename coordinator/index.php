<?php

include '../connection/config.php';
error_reporting(0);

session_start();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>OJT Web Portal</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 2rem;
            background: url(./images/itech.jpg);
            background-color: rgba(255, 255, 255, 0.39);
            background-blend-mode: overlay;
            height: 94vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        h5{
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 50px;  
            align-items: center;
            justify-content: center;
            display: flex;
            line-height: 0.5;
            color: #9B0C0C;
        }
        i {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;  
            align-items: center;
            justify-content: center;
            display: flex;
            line-height: 0.5;
        }

        input {
          width: 500px;
          height: 50px;
          padding: 10px;
          margin: 10px 0;
          border: 1px solid #000;
          border-radius: 5px;
          outline: none;
          color: #000;
          font-size: 14px;
        }

        .nav-hte {
          font-family: 'Source Serif 4', serif;
          background: linear-gradient(to left, rgba(155, 12, 12, 1), rgba(255, 255, 255, 1));
          color: rgb(141, 9, 9);
          padding: 15px 0;
          text-align: left;
          font-size: 20px;
          font-weight: 400;
          position: fixed;
          top: 0;
          right: 0;
          width: 100%;
          display: flex;
          align-items: center;
          margin: 0 auto;
          background-clip: padding-box;
        }

        .nav-logo {
          height: 50px;
          margin-left: 20px;
        }

        .nav-title {
          font-size: 24px;
          font-weight: bold;
        }

        .nav-caption {
          font-size: 16px;
          color: #000;
          font-weight: normal;
        }

        .nav-title-caption-container {
          display: flex;
          flex-direction: column;
          margin-left: 20px;
        }

        .login-section {
            background: #fff;
            width: 850px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.5;
        }

        .back-button {
          display: flex;
          align-items: center;
          background: none;
          color: rgba(128, 128, 128, 0.5);
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 16px;
          font-weight: 400;
          transition: 0.3;
          position: relative;
          right: 185px;
          bottom: 15px;
        }

        .back-button img {
          height: 40px;
          filter: grayscale(100%);
          opacity: 0.3;
          transition: filter 0.3s ease, opacity 0.3s ease;
        }

        .back-button:hover,
        .back-button:hover img {
          color: #9B0C0C;
          filter: grayscale(0%) sepia(100%) hue-rotate(330deg) saturate(500px);
          opacity: 1;
        }

        .header {
          display: flex;
          align-items: center;
          gap: 50px;
        }

        .login-button {
          width: 500px;
          height: 50px;
          background-color: #9B0C0C;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 18px;
          font-weight: 600;
          margin-top: 10px;
          transition: 0.3s;
        }

        .forgot-password {
            font-size: 16px;
            color: #9B0C0C;
        }

        .register-here {
            font-size: 16px;
            color:#0C0C9B;
        }

        a {
          align-self: center;
          justify-self: center;
          display: flex;
        }
    </style>
</head>
  <body>
    <!-- Nav Bar -->
    <nav class="nav-hte">
      <img src="images/pupLogo copy.png" alt="pup logo" class="nav-logo">
      <div class="nav-title-caption-container">
        <div class="nav-title">Polytechnic University of the Philippines</div>
        <div class="nav-caption">On the Job Training Portal</div>
      </div>
    </nav>

      <!-- Login Container -->
    <section id="sec-ae5f" class="login-section">
      <div>
        <div>
          <div>
            <div class="header">
              <a href="\drills\index.php" class="back-button"><img src="images/less-than.png" alt="back icon" alt="">Back</a>
              <h5>FACULTY ACCOUNT</h5>
            </div>
            <div>
            <form action="../php/stud_loginCode.php" method="POST">
                <div class="u-form-group u-form-name">
                  <label for="studEMAIL" class="u-label">Username</label><br>
                  <input type="email" placeholder="Enter Username" id="studEMAIL" name="studEmail" required="">
                </div>
                <div class="u-form-group u-form-name">
                  <label for="pword" class="u-label">Password</label><br>
                  <input type="password" placeholder="Enter Password" id="studEMAIL" name="studEmail" required="">
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                <button name="Login" class="login-button">Log In</button>
                </div>
                <p><a href="#" class="forgot-password">Forgot Password?</a></p>
                <p><a href="coordinators_register.php" class="register-here">Register Here</a></p>
              </form>
              <br>
            </div>
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

</body></html>