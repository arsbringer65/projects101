<?php
?>
<!-------------------DASHBOARD--------------->
<div class="dashboard">
    <table>

        <thead>
            <tr>
                <th>Barangay</th>
                <th>Collection Date</th>
                <th>Time</th>
            </tr>
        </thead>

        <?php
        include('./models/dashboard.model.php')
        ?>

    </table>