<?php
header("Content-Type: application/json");
include_once "db.php";
include_once "Job.php";
$data = json_decode(file_get_contents("php://input"));
if (!empty($data->title) && !empty($data->company) && !empty($data->description)) {
  $database = new Database();
  $db = $database->getConnection();
  $job = new Job($db);
  if ($job->create($data->title, $data->company, $data->description)) {
    echo json_encode(["message" => "Job posted successfully"]);
  } else {
    echo json_encode(["message" => "Failed to post job"]);
  }
} else {
  echo json_encode(["message" => "Missing required fields"]);
} ?>