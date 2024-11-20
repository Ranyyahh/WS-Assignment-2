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
    <h3>Student Records</h3>
    <?php if (!empty($studentRecords)) : ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentRecords as $student) : ?>
                    <tr>
                        <td><?php echo $student['Stud_ID']; ?></td>
                        <td><?php echo $student['Stud_Name']; ?></td>
                        <td><?php echo $student['Major']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No student records found.</p>
    <?php endif; ?>

  
    <h3>Course Records</h3>
    <?php if (!empty($courseRecords)) : ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courseRecords as $course) : ?>
                    <tr>
                        <td><?php echo $course['Course_ID']; ?></td>
                        <td><?php echo $course['Course_Name']; ?></td>
                        <td><?php echo $course['Department']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No course records found.</p>
    <?php endif; ?>
</body>
</html>
