<?php
$con = new mysqli('localhost', 'root', '', 'MIS_DB');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$studentRecords = [];
$sql = "SELECT * FROM STUDENT_TBL";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $studentRecords[] = $row;
    }
}

$courseRecords = [];
$sql = "SELECT * FROM COURSE_TBL";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courseRecords[] = $row;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <br>
    <br>
    <title>Student and Course Records</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h1>Student and Course Records</h1>
    <div class="button">
            <a href="MIS_DB.html">
            <center><button type="button">Insert Data</button></a></center>
        </div>
        <br>
        <br>
    <center><h3>Student Records</h3>
<?php if (!empty($studentRecords)) : ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
        
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Major</th>
                <th style="padding: 10px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentRecords as $student) : ?>
                <tr>
                    <td ><?php echo $student['Stud_ID']; ?></td>
                    <td><?php echo $student['Stud_Name']; ?></td>
                    <td><?php echo $student['Major']; ?></td>
                    <td>
                        
                        <form action="update.php" method="post" >
                            <input type="hidden" name="id" value="<?php echo $student['Stud_ID']; ?>">
                            <button type="submit" name="action" value="update" class="update-button">Update</button>
                        </form>

                      
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $student['Stud_ID']; ?>">
                            <button type="submit" name="action" value="delete"class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No student records found.</p>
<?php endif; ?>

    <br><br>
    <h3>Course Records</h3>
    <?php if (!empty($courseRecords)) : ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th style="padding: 10px;">ID</th>
                    <th style="padding: 10px;">Course Name</th>
                    <th style="padding: 10px;">Department</th>
                    <th style="padding: 10px;">Actions</th>
                </tr>   
            </thead>
            <tbody>
                <?php foreach ($courseRecords as $course) : ?>
                    <tr>
                        <td><?php echo $course['Course_ID']; ?></td>
                        <td><?php echo $course['Course_Name']; ?></td>
                        <td><?php echo $course['Department']; ?></td>
                        <td> 
                            
                            <form action="update.php" method="post" >
                                <input type="hidden" name="id" value="<?php echo $course['Course_ID']; ?>">
                                <button type="submit" name="action" value="update" class="update-button">Update</button>
                            </form>

                            <form action="delete_course.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $course['Course_ID']; ?>">
                            <button type="submit" name="action" value="delete" class="delete-button">Delete</button>
                        </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No course records found.</p>
    <?php endif; ?>
    </center>
</body>
</html>
