<?php
include ('./conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $contactNumber = $_POST['contact_number'];
    $email = $_POST['email'];
    $tenthPercentage = $_POST['tenth_percentage'];
    $twelfthPercentage = $_POST['twelfth_percentage'];

    try {
        $conn->beginTransaction();

        $stmt = $conn->prepare("INSERT INTO `tbl_student` (`first_name`, `last_name`, `contact_number`, `email`, `tenth_percentage`, `twelfth_percentage`) VALUES (:first_name, :last_name, :contact_number, :email, :tenth_percentage, :twelfth_percentage)");
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':contact_number', $contactNumber, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':tenth_percentage', $tenthPercentage, PDO::PARAM_STR);
        $stmt->bindParam(':twelfth_percentage', $twelfthPercentage, PDO::PARAM_STR);
        $stmt->execute();

        $conn->commit();

        echo "
        <script>
            alert('Student Details Added Successfully');
            window.location.href = 'student-detail.php';
        </script>
        ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail Form</title>
    <link rel="stylesheet" href="./assets/marks.css">
</head>
<body>
    <div class="main">
        <div class="form-container">
            <h1>Student Detail Form</h1>
            <form action="student-detail.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="tenth_percentage">10th Percentage:</label>
                    <input type="text" id="tenth_percentage" name="tenth_percentage" required>
                </div>
                <div class="form-group">
                    <label for="twelfth_percentage">12th Percentage:</label>
                    <input type="text" id="twelfth_percentage" name="twelfth_percentage" required>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
