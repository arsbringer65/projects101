<?php
// include('./components/header.php');



?>

<form class="addsched" action="models/addsched.model.php" method="POST">
    <label for="barangay">Barangay</label>
    <select name="barangay" id="barangay">
        <option value="Santa Rita">Santa Rita</option>
        <option value="'East Tapinac">'East Tapinac</option>
        <option value="West Tapinac">West Tapinac</option>
    </select>
    <label for="collectiondate">Date</label>
    <input type="date" name="date_collection" id="date_collection">
    <label for="collectiontime">Time</label>
    <input type="time" name="time_collection" id="time_collection">
    <input type="submit" value="addsched" name="submit">
</form>