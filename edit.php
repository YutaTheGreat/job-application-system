<?php 
require_once 'core/dbConfig.php'; 
require_once 'models/models.php'; 

if (!isset($_GET['applicant_id'])) {
    header("Location: index.php");
    exit();
}

$getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Analyst Applicant Details</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { padding: 15px; border: 1px solid #ccc; width: 350px; }
        input, select { display: block; width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <h2>Edit Data Analyst Application</h2>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="applicant_id" value="<?php echo $getApplicantByID['applicant_id']; ?>">

        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo $getApplicantByID['first_name']; ?>" required>

        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo $getApplicantByID['last_name']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $getApplicantByID['email']; ?>" required>

        <label>Primary Analytics Tool</label>
        <input type="text" name="primary_tool" value="<?php echo $getApplicantByID['primary_tool']; ?>" required>

        <label>SQL Proficiency Level</label>
        <select name="sql_proficiency_level" required>
            <option value="Beginner" <?php echo ($getApplicantByID['sql_proficiency_level'] == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
            <option value="Intermediate" <?php echo ($getApplicantByID['sql_proficiency_level'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
            <option value="Advanced" <?php echo ($getApplicantByID['sql_proficiency_level'] == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
        </select>

        <label>Expected Salary (PHP)</label>
        <input type="number" step="0.01" name="expected_salary" value="<?php echo $getApplicantByID['expected_salary']; ?>" required>

        <input type="submit" name="editApplicantBtn" value="Update Details">
        <a href="index.php">Cancel</a>
    </form>

</body>
</html>