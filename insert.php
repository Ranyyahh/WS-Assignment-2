<?php

$con = new mysqli('localhost', 'root', '', 'MIS_DB');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connection successful!<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['stud_name']) && isset($_POST['major'])) {
        $Stud_Name = $_POST['stud_name'];
        $Major = $_POST['major'];

        $sql = "INSERT INTO student_tbl (stud_name, major) VALUES ('$Stud_Name', '$Major')";
        if ($con->query($sql) === TRUE) {
        } else {
            echo "Error inserting student data: " . $con->error;
        }
    } else {
        echo "Student data is missing!<br>";
    }

    if (isset($_POST['course_name']) && isset($_POST['department'])) {
        $Course_Name = $_POST['course_name'];
        $Department = $_POST['department'];

        $sql = "INSERT INTO course_tbl (course_name, department) VALUES ('$Course_Name', '$Department')";
        if ($con->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    alert("Data inserted successfully!");
                    window.location.href = "MIS_DB.html"; // Redirect after alert
                  </script>';
            exit(); 
        } else {
            echo "Error inserting course data: " . $con->error;
        }
    } else {
        echo "Course data is missing!<br>";
    }
}

$con->close();
?>
