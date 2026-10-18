<?php
require_once 'dbConfig.php';
require_once '../models/models.php';

// Handle CREATE action
if (isset($_POST['insertApplicantBtn'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $primary_tool = trim($_POST['primary_tool']);
    $sql_proficiency_level = trim($_POST['sql_proficiency_level']);
    $expected_salary = trim($_POST['expected_salary']);

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($primary_tool) && !empty($sql_proficiency_level) && !empty($expected_salary)) {
        $query = insertApplicant($pdo, $first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary);
        if ($query) {
            header("Location: ../index.php");
            exit();
        }
    }
}

// Handle UPDATE action
if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = $_POST['applicant_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $primary_tool = trim($_POST['primary_tool']);
    $sql_proficiency_level = trim($_POST['sql_proficiency_level']);
    $expected_salary = trim($_POST['expected_salary']);

    $query = updateApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary);
    if ($query) {
        header("Location: ../index.php");
        exit();
    }
}

// Handle DELETE action
if (isset($_GET['delete_id'])) {
    $applicant_id = $_GET['delete_id'];
    $query = deleteApplicant($pdo, $applicant_id);
    if ($query) {
        header("Location: ../index.php");
        exit();
    }
}
?>