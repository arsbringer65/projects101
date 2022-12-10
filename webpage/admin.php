<?php
include('header.php');   
?>

    <main>
        <h1>Dashboard Schedule</h1>
        <!---------------AUTO TIME AND DATE------------>
        <p><b>Today is: </b><span id="time-date" class="date"></p>
          <!-- Adding Schedules -->
        <form class="" action="">
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
          <button type="submit">Submit</button>
        </form>
        <!-------------------DASHBOARD--------------->
        <div class="dashboard">

          <?php
          $sql = "SELECT * FROM schedule;";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          
          // $schedules = $stmt->fetchAll();
          ?>
          <?php echo "<table>"; ?>

          <thead>
              <tr>
                <th>Barangay</th>
                <th>Collection Date</th>
                <th>Time</th>
              </tr>
          </thead>
          
          <?php
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<td>" . $row['brgy'] . "</td>";
              echo "<td>" . $row['date'] . "</td>";
              echo "<td>" . $row['time'] . "</td>";
              echo "</tr>";
          }

          echo "</table>";


         ?>
        </div>
    </main>
    <!---------------RECENT UDPATES SIDE----------->
    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="theme-toggler">
          <i class="fa-solid fa-sun active"></i>
          <i class="fa-solid fa-moon"></i>
        </div>
        <div class="profile">
          <div class="info">
            <p>Good Day, <b>Treisha</b></p>
              <small class="text-muted">Admin</small>
          </div>
        </div>
        <div class="profile-photo">
          <img src="images/adminprofile1.png">
        </div>
      </div>
      <!------------------END OF TOP SIDE--------->
      <?php
      include('news.php');
      ?>
    </div>
  </div>
    <!--SCRIPT-->
    <!-- <script src="js/fetch.js"></script> -->
    <script src="js/updates.js"></script>
    <script src="js/main.js"></script>
    <script>
      displayTimeAndDateInWords();
    </script>
</body>
</html>
