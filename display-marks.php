<?php
include ('./conn/conn.php');

// Retrieve student details and sort them by 10th percentage
$stmt = $conn->prepare("SELECT * FROM `tbl_student` ORDER BY `tenth_percentage` DESC");
$stmt->execute();
$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Marks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 5;
            padding: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table td {
            vertical-align: top;
        }
    </style>
</head>
<body>

<div class="main">
    <div class="content">
        <h4 style="text-align: center;">List of Students (Sorted by 10th Percentage)</h4>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">10th Percentage</th>
                    <th scope="col">12th Percentage</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>{$row['student_id']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['tenth_percentage']}</td>";
                    echo "<td>{$row['twelfth_percentage']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
