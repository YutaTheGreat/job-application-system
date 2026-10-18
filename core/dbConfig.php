CREATE DATABASE IF NOT EXISTS job_application_db;
USE job_application_db;

CREATE TABLE IF NOT EXISTS data_analyst_applications (
    applicant_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    primary_tool VARCHAR(50) NOT NULL,
    sql_proficiency_level VARCHAR(30) NOT NULL,
    expected_salary DECIMAL(10, 2) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
