<?php
?>
<!---------------RECENT UDPATES SIDE----------->
<div class="discussion-board">
        <h2>Recent Updates</h2>
        <div class="discussions">
          <div class="discussion">
            <?php
            $sql = "SELECT * FROM news;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            ?>
            <div class="profile-photo">
              <img src="images/announcement.png">
            </div>
            <div class="post">
              <p><b>System: </b>Collection in Brgy. East Tapinac has been delayed due to...</p>
              <small class="text-muted">6 secs ago</small>
            </div>
            

            
          </div>
        </div>
      </div>
      <!---------------END OF RECENT UDPATES SECTION--------------->