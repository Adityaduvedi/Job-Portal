<?php
header("Content-Type: application/json");
include_once "db.php";
include_once "Job.php";
$database = new Database();
$db = $database->getConnection();
$job = new Job($db);
$stmt = $job->read();
$jobs = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $jobs[] = [
    "id" => $id,
    "title" => $title,
    "company" => $company,
    "description" => $description
  ];
}
echo json_encode($jobs);
?>