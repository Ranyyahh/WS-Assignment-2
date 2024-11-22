<?php
$con = new mysqli('localhost', 'root', '', 'MIS_DB');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'update') {
        // Sanitize input
        $id = intval($_POST['id']);

        // Fetch record for the given ID from student_tbl
        $sql = "SELECT * FROM student_tbl WHERE Stud_ID = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
            ?>

            <!-- Update Student Form -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Update Student</title>
            </head>
            <body>
                <h1>Update Student</h1>
                <form action="update_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $student['Stud_ID']; ?>">
                    <label>Name: </label>
                    <input type="text" name="stud_name" value="<?php echo $student['Stud_Name']; ?>" required><br>
                    <label>Major: </label>
                    <input type="text" name="major" value="<?php echo $student['Major']; ?>" required><br>
                    <button type="submit">Update</button>
                </form>
            </body>
            </html>

            <?php
        } 

        // Fetch record for the given ID from course_tbl
        $sql = "SELECT * FROM course_tbl WHERE Course_ID = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $course = $result->fetch_assoc();
            ?>

            <!-- Update Course Form -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Update Course</title>
            </head>
            <body>
                <h1>Update Course</h1>
                <form action="update_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $course['Course_ID']; ?>">
                    <label>Course Name: </label>
                    <input type="text" name="course_name" value="<?php echo $course['Course_Name']; ?>" required><br>
                    <label>Department: </label>
                    <input type="text" name="department" value="<?php echo $course['Department']; ?>" required><br>
                    <button type="submit">Update</button>
                </form>
            </body>
            </html>

            <?php
        } 
    } else {
        echo "Invalid request.";
    }
}

$con->close();
?>

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



