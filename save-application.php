<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false]);
    exit;
}

$data = $_POST;

try {

    $sql = "INSERT INTO applications_2026 (
        course_type, course, academic_session,
        applicant_name, father_name, mother_name,
        gender, dob, category,
        mobile, nationality,
        present_address, present_ps, present_dist, present_pin, present_email,
        permanent_address,
        father_occupation, father_mobile,
        mother_occupation, mother_mobile
    ) VALUES (
        :course_type, :course, :academic_session,
        :applicant_name, :father_name, :mother_name,
        :gender, :dob, :category,
        :mobile, :nationality,
        :present_address, :present_ps, :present_dist, :present_pin, :present_email,
        :permanent_address,
        :father_occupation, :father_mobile,
        :mother_occupation, :mother_mobile
    )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    $id = $pdo->lastInsertId();

    $appNo = 'SRM2026-' . str_pad($id, 4, '0', STR_PAD_LEFT);

    $pdo->prepare("UPDATE applications_2026 SET application_no=? WHERE id=?")
        ->execute([$appNo, $id]);

    echo json_encode([
        'success' => true,
        'application_no' => $appNo
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}