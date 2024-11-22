<?php
$con = new mysqli('localhost', 'root', '', 'MIS_DB');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = intval($_POST['id']);

        $sql = "DELETE FROM course_tbl WHERE Course_ID = $id";

        if ($con->query($sql) === TRUE) {
            echo "Record deleted successfully.";
            header("Location: select.php");
            exit();
        } else {
            echo "Error deleting record: " . $con->error;
        }
    } else {
        echo "Invalid request.";
    }
}
$con->close();
?>
