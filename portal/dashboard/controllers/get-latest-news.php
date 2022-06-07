<?php
session_start();
require_once '../../database/db-con.php';
?>
<?php
if (isset($_SESSION['user_session_var'])) {
    $user_id = $_SESSION['user_session_var'];

    $user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
    $run_fetch = mysqli_query($con, $user_query);
    $user_data = mysqli_fetch_assoc($run_fetch);

    if ($user_data['email_verification'] == 0) {
        echo "<script>window.location='../../utility/email-not-verified.php';</script>";
    }
} else {
?>
    <script>
        window.location = '../../auth/login.php';
    </script>
<?php
}
?>


<?php

//declaring variable to handle query failure
$query_err = 0;

//declaring variable for query run or not
$query_run = 0;

//get ajax call function for the add faq
if (isset($_POST['ajax_call'])) {

?>
    
    <marquee behavior="scroll" scrollamount="5" direction = "up"  height="290">
                <?php
                //get latest 20 entries from table dashboard_news
                $query = "SELECT * FROM `dashboard_news` ORDER BY `id` DESC LIMIT 100";
                $run_query = mysqli_query($con, $query);
                $query_err = mysqli_error($con);
                $query_run = mysqli_num_rows($run_query);

                if ($query_run > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($run_query)) {

                ?>
                        <div class="row">

                            <div class="col"><?php echo $row['title']; ?></div>
                            <div class="col">
                                <?php
                                //get the time of the news
                                $time = $row['timestamp'];
                                //convert the time to a readable format
                                $time = date('d-m-Y H:i:s', $time);
                                echo $time;
                                ?>
                            </div>

                        </div>
                    <?php
                    }
                } else {
                    ?>

                    <tr>
                        <td colspan="2" class="text-center">No Data Available</td>
                    </tr>
                <?php
                }

                ?>
</marquee>

<?php

}

?>