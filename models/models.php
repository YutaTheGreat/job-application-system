<?php
require_once __DIR__ . '/../core/dbConfig.php';

// 1. CREATE: Insert new Data Analyst applicant
function insertApplicant($pdo, $first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary) {
    $sql = "INSERT INTO data_analyst_applications 
            (first_name, last_name, email, primary_tool, sql_proficiency_level, expected_salary) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary]);
}

// 2. READ: Fetch all Data Analyst applications
function getAllApplicants($pdo) {
    $sql = "SELECT * FROM data_analyst_applications ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// READ: Fetch single application record by ID
function getApplicantByID($pdo, $applicant_id) {
    $sql = "SELECT * FROM data_analyst_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
    return $stmt->fetch();
}

// 3. UPDATE: Edit existing Data Analyst applicant record
function updateApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary) {
    $sql = "UPDATE data_analyst_applications 
            SET first_name = ?, last_name = ?, email = ?, primary_tool = ?, sql_proficiency_level = ?, expected_salary = ? 
            WHERE applicant_id = ?";
            
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $primary_tool, $sql_proficiency_level, $expected_salary, $applicant_id]);
}

// 4. DELETE: Remove record by ID
function deleteApplicant($pdo, $applicant_id) {
    $sql = "DELETE FROM data_analyst_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$applicant_id]);
}
?>