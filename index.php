<?php 
require_once 'core/dbConfig.php'; 
require_once 'models/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Analyst Job Application System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; width: 350px; }
        input, select { display: block; width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Data Analyst Job Application Form</h2>
    <form action="core/handleForms.php" method="POST">
        <label>First Name</label>
        <input type="text" name="first_name" required>

        <label>Last Name</label>
        <input type="text" name="last_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Primary Analytics Tool</label>
        <input type="text" name="primary_tool" placeholder="e.g. Python, Power BI, Excel, Tableau" required>

        <label>SQL Proficiency Level</label>
        <select name="sql_proficiency_level" required>
            <option value="">--Select Level--</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>

        <label>Expected Salary (PHP)</label>
        <input type="number" step="0.01" name="expected_salary" required>

        <input type="submit" name="insertApplicantBtn" value="Submit Application">
    </form>

    <hr>

    <h2>Submitted Applications</h2>
    <table>
        <tr>
            <th>Applicant ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Primary Tool</th>
            <th>SQL Level</th>
            <th>Expected Salary</th>
            <th>Date Applied</th>
            <th>Actions</th>
        </tr>
        <?php $allApplicants = getAllApplicants($pdo); ?>
        <?php foreach ($allApplicants as $row): ?>
        <tr>
            <td><?php echo $row['applicant_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['primary_tool']; ?></td>
            <td><?php echo $row['sql_proficiency_level']; ?></td>
            <td>₱<?php echo number_format($row['expected_salary'], 2); ?></td>
            <td><?php echo $row['date_added']; ?></td>
            <td>
                <a href="edit.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a> | 
                <a href="core/handleForms.php?delete_id=<?php echo $row['applicant_id']; ?>" onclick="return confirm('Are you sure you want to delete this application?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>