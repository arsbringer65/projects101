<?php
include('./models/conn.php');

if (isset($_POST['ids'])) {
  // Create a string of comma-separated placeholders for the SQL query
  $placeholders = implode(',', array_fill(0, count($_POST['ids']), '?'));

  $sql = "DELETE FROM schedule WHERE id IN ($placeholders)";
  $stmt = $pdo->prepare($sql);

  // Bind the values from the form to the query as parameters
  $stmt->execute($_POST['ids']);
}
