<?php
$sql = "SELECT * FROM schedule;";
$stmt = $pdo->prepare($sql);
$stmt->execute();


$schedules = $stmt->fetchAll();

?>
<form method="post" action="models/deletesched.php">
    <label>Select the rows to delete:</label><br />
    <?php
    foreach($schedules as $schedule){
        echo '<input type="checkbox" name="ids[]" value=".$schedule->id.">'.$schedule->brgy." ".$schedule->date  .'<br />';
    }
  
    ?>
    <input type="checkbox" name="ids[]" value="1"> Row 1<br />
    <input type="checkbox" name="ids[]" value="1"> Row 1<br />
    ...
    <input type="submit" value="delete">
</form>