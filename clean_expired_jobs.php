<?php
include_once "db.php";
$db = (new Database())->getConnection();
$query = "DELETE FROM jobs WHERE created_at < NOW() - INTERVAL 30 DAY";
$stmt = $db->prepare($query);
$stmt->execute();
echo "Old jobs deleted.";
?>