<?php
class Job {
  private $conn;
  private $table = "jobs";
  public function __construct($db) {
    $this->conn = $db;
  }
  public function create($title, $company, $description) {
    $query = "INSERT INTO " . $this->table . " (title, company, description) VALUES (:title, :company, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":company", $company);
    $stmt->bindParam(":description", $description);
    return $stmt->execute();
  }
  public function read() {
    $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
} ?>