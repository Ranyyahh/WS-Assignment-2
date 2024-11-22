<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['action']) && $_POST['action'] == 'delete') {
    $id = intval($_POST['id']);
    
    
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $sql = "DELETE FROM student_tbl WHERE Stud_ID = $id";
        if ($con->query($sql) === TRUE) {
            echo "Student deleted successfully!";
            header("Location: select.php");
            exit();
        } else {
            echo "Error deleting student: " . $con->error;
        }
    }

   
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $sql = "DELETE FROM course_tbl WHERE Course_ID = $id";
        if ($con->query($sql) === TRUE) {
            echo "Course deleted successfully!";
            header("Location: select.php");
            exit();
        } else {
            echo "Error deleting course: " . $con->error;
        }
    }
}

$con->close();
?>
