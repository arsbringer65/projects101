<?php 
require_once "header.php"
?>

    
    <main>
        <h1>Dashboard Schedule</h1>
        <!---------------AUTO TIME AND DATE------------>
        <p><b>Today is: </b><span id="time-date" class="date"></p>
        <!-------------------DASHBOARD--------------->
        <div class="dashboard">
          <table>
            <thead>
              <tr>
                <th>Barangay</th>
                <th>Collection Date</th>
                <th>Time</th>
                <th>Status</th>
              </tr>
            </thead> 
            <tbody>
              
            </tbody>
          </table>
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
            <p>Good Day, <b>Abdul</b></p>
              <small class="text-muted">User</small>
          </div>
        </div>
        <div class="profile-photo">
          <img src="images/user1.png">
        </div>
      </div>
      <!------------------END OF TOP SIDE--------->
      <div class="discussion-board">
        <h2>Recent Updates</h2>
        <div class="discussions">
          <div class="discussion">
            <div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>Collection in Brgy. East Tapinac has been delayed due to...</p>
              <small class="text-muted">6 secs ago</small>
            </div>
            <div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>Holidays is here! Don't forget to celebrate this with your...</p>
              <small class="text-muted">2 hours ago</small>
            </div>
            <div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>Please always keep our surroundings clean by taking... </p>
              <small class="text-muted">3 hours ago</small>
            </div>
            <div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>To the residents of Gordon Heights, there wil be some delay...</p>
              <small class="text-muted">8 hours ago</small>
            </div><div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>Our goal is to lessen any risks to public health and safety b...</p>
              <small class="text-muted">10 hours ago</small>
            </div><div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>DYK: Philippines produce over 21 million metric tons of gar...</p>
              <small class="text-muted">12 hours ago</small>
            </div><div class="profile-photo">
              <img src="images/announcement.png ">
            </div>
            <div class="post">
              <p><b>System: </b>Please be advised that there will be scheduled downtime...</p>
              <small class="text-muted">Dec 7, 2022, 8:00AM</small>
            </div><div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>"The objective of cleaning is not just to clean, but to feel hap...</p>
              <small class="text-muted">Dec 5, 2022, 1:00PM</small>
            </div>
            
          </div>
        </div>
      </div>
      <!---------------END OF RECENT UDPATES SECTION--------------->
    </div>
  </div>
    <!--SCRIPT-->
    <script src="js/updates.js"></script>
    <script src="js/user.js"></script>
    <script>
      displayTimeAndDateInWords();
    </script>
</body>
</html>
