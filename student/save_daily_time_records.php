<?php

include '../connection/config.php';
//display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

function calculateTotalHours($amTimeIn, $amTimeOut, $pmTimeIn, $pmTimeOut) {
    $totalHours = 0;

    if (!empty($amTimeIn) && !empty($amTimeOut)) {
        $amHours = (strtotime($amTimeOut) - strtotime($amTimeIn)) / 3600;
        $totalHours += $amHours;
    }

    if (!empty($pmTimeIn) && !empty($pmTimeOut)) {
        $pmHours = (strtotime($pmTimeOut) - strtotime($pmTimeIn)) / 3600;
        $totalHours += $pmHours;
    }

    return $totalHours;
}

if (isset($_POST['timeINtimeOUT'])) {
    date_default_timezone_set('Asia/Manila');
    $date_record = $_POST['date_record'];
    $time_record = $_POST['time_record'];
    $selectTIMEinTIMEout = $_POST['selectTIMEinTIMEout'];

    $studID = $_SESSION['auth_user']['student_id'];

    // Handle the image upload
    $uploadDir = 'uploads/';
    $uploadFilePath = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
        // The image has been uploaded successfully
        // Now, insert the path into the database
        $image_path = $uploadFilePath;
    } else {
        $image_path = ''; // Set to an empty string or a default image path if the upload fails
    }

    $stmt = $conn->prepare("SELECT * FROM stud_daily_time_records WHERE stud_id = ? AND recordDate = ?");
    $stmt->execute([$studID, $date_record]);
    $existingRecord = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$existingRecord) {
        if ($selectTIMEinTIMEout == "AM Time In") {
            $insertStatement = "INSERT INTO stud_daily_time_records (stud_id, recordDate, AM_time_IN, total_working_hours, image_path) VALUES (?, ?, ?,  0, ?)";
            $stmt = $conn->prepare($insertStatement);
            $stmt->execute([$studID, $date_record, $time_record, $image_path]);
        }
    } else {
        if ($selectTIMEinTIMEout == "AM Time Out") {
            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET AM_time_OUT = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$time_record, $studID, $date_record]);

            // Calculate total working hours and update the database
            $totalHours = calculateTotalHours(
                $existingRecord['AM_time_IN'],
                $time_record,
                $existingRecord['PM_time_IN'],
                $existingRecord['PM_time_OUT']
            );

            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET total_working_hours = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$totalHours, $studID, $date_record]);
        } elseif ($selectTIMEinTIMEout == "PM Time In") {
            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET PM_time_IN = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$time_record, $studID, $date_record]);

            // Calculate total working hours and update the database
            $totalHours = calculateTotalHours(
                $existingRecord['AM_time_IN'],
                $existingRecord['AM_time_OUT'],
                $time_record,
                $existingRecord['PM_time_OUT']
            );

            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET total_working_hours = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$totalHours, $studID, $date_record]);
        } elseif ($selectTIMEinTIMEout == "PM Time Out") {
            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET PM_time_OUT = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$time_record, $studID, $date_record]);

            // Calculate total working hours and update the database
            $totalHours = calculateTotalHours(
                $existingRecord['AM_time_IN'],
                $existingRecord['AM_time_OUT'],
                $existingRecord['PM_time_IN'],
                $time_record
            );

            $stmt = $conn->prepare("UPDATE stud_daily_time_records SET total_working_hours = ? WHERE stud_id = ? AND recordDate = ?");
            $stmt->execute([$totalHours, $studID, $date_record]);
        }
    }

    header('Location: daily_time_records.php');
    exit();
}

// Function to calculate working hours
// function calculateWorkingHours($timeIn, $timeOut) {
//     $timeIn = strtotime($timeIn);
//     $timeOut = strtotime($timeOut);

//     if ($timeIn === false || $timeOut === false) {
//         return 0;
//     }

//     // Check if timeOut is greater than timeIn to avoid negative working hours
//     if ($timeOut > $timeIn) {
//         $hours = ($timeOut - $timeIn) / 3600;
//         return $hours;
//     }

//     return 0; // Invalid time range, return 0
// }




?>