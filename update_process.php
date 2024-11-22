<?php
$con = new mysqli('localhost', 'root', '', 'MIS_DB');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'], $_POST['stud_name'], $_POST['major'])) {
        $id = intval($_POST['id']);
        $stud_name = $con->real_escape_string($_POST['stud_name']);
        $major = $con->real_escape_string($_POST['major']);

        $sql = "UPDATE student_tbl SET Stud_Name='$stud_name', Major='$major' WHERE Stud_ID=$id";

        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully.";
            header("Location: select.php");
            exit();
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else {
        echo "Missing required fields.";
    }
}
$con->close();
?>

<?php
$con = new mysqli('localhost', 'root', '', 'MIS_DB');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['course_name'], $_POST['department'])) {
    $id = intval($_POST['id']);  
    $course_name = $con->real_escape_string($_POST['course_name']);  
    $department = $con->real_escape_string($_POST['department']);  

    
    $sql = "UPDATE course_tbl SET Course_Name = '$course_name', Department = '$department' WHERE Course_ID = $id";

    if ($con->query($sql) === TRUE) {
        echo "Course updated successfully!";
        header("Location: select.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>


