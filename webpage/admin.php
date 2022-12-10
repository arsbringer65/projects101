<?php
include('./components/header.php');
include('./components/admin.nav.component.php');
?>

    <main>
        <h1>Dashboard Schedule</h1>
        <!---------------AUTO TIME AND DATE------------>
        <p><b>Today is: </b><span id="time-date" class="date"></p>
          <!-- Adding Schedules -->
        <?php
        include('./components/addsched.php');
        include('./components/dashboard.component.php')
        ?>
        
        </div>
    </main>
    
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
      include('./components/news.component.php');
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
