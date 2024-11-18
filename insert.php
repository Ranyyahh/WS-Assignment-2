<?php

$con = new mysqli('localhost', 'root', '', 'MIS_DB');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {

        echo "Connection successful!<br>";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['stud_name']) && isset($_POST['major'])){
        $Stud_Name = $_POST['stud_name'];
        $Major = $_POST['major'];

    $sql = "INSERT INTO student_tbl (stud_name, major) VALUES ('$Stud_Name', '$Major')";
    if ($con->query($sql) === TRUE) {

        echo "Data 1 inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
    }
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Course_Name = $_POST['course_name'];
        $Department = $_POST['department'];

    $sql = "INSERT INTO course_tbl (course_name, department) VALUES ('$Course_Name', '$Department')";
    if ($con->query($sql) === TRUE) {
        "<br>";
        echo "Data 2 inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>