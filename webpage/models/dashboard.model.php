<?php
$sql = "SELECT * FROM schedule;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['brgy'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "</tr>";
}
?>