<?php
session_start();
require_once '../../database/db-con.php';
?>
<?php
if (isset($_SESSION['admin_session_var'])) {
   $user_id = $_SESSION['admin_session_var'];
} else {
   header('location:../../auth/login.php');
}
$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
$run_fetch = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($run_fetch);
if ($user_data['email_verification'] == 0) {
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
}
?>

<?php

if (isset($_POST['add_votes'])) {
   $scam_id = $_POST['scam_id'];
   $total_votes = $_POST['total_votes'];
   $up_votes = $_POST['up_votes'];
   $down_votes = $_POST['down_votes'];


   echo $total_votes;
   echo $up_votes;
   echo $down_votes;

   //getting total fake accounts in the from the user table
   $query1 = "SELECT * FROM `users` WHERE `user_role` = 4";
   $runquery1 = mysqli_query($con, $query1);
   $rows1 = mysqli_num_rows($runquery1);

   if ($rows1 < $total_votes) {
      //insert new users in user table 


      //generating random string
      function generateRandomString($length = 10)
      {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         return $randomString;
      }

      //generating random name
      function randomName()
      {
         $first_name = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha',
         );



         $middle_name = array(
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'Q',
            'R',
            'S',
            'S',
            'S',
            'S',
            'T',
            'U',
            'V',
            'Y',
            'Z',
            'A',
            'A',
            'D',
            'E',
            'F',
            'G',
            'H',
            'H',
            'I',
            'J',
            'K',
            'K',
            'L',
            'M',
            'M',
            'S',
            'S',
            'N',
            'S',
            'S',
            'S',
            'N',
            'O',
         );


         $last_name = array(
            'Mischke',
            'Serna',
            'Pingree',
            'Mcnaught',
            'Pepper',
            'Schildgen',
            'Mongold',
            'Wrona',
            'Geddes',
            'Lanz',
            'Fetzer',
            'Schroeder',
            'Block',
            'Mayoral',
            'Fleishman',
            'Roberie',
            'Latson',
            'Lupo',
            'Motsinger',
            'Drews',
            'Coby',
            'Redner',
            'Culton',
            'Howe',
            'Stoval',
            'Michaud',
            'Mote',
            'Menjivar',
            'Wiers',
            'Paris',
            'Grisby',
            'Noren',
            'Damron',
            'Kazmierczak',
            'Haslett',
            'Guillemette',
            'Buresh',
            'Center',
            'Kucera',
            'Catt',
            'Badon',
            'Grumbles',
            'Antes',
            'Byron',
            'Volkman',
            'Klemp',
            'Pekar',
            'Pecora',
            'Schewe',
            'Ramage',
         );

         $name = $first_name[rand(0, count($first_name) - 1)];
         $name .= ' ';
         $name = $middle_name[rand(0, count($middle_name) - 1)];
         $name .= ' ';
         $name .= $last_name[rand(0, count($last_name) - 1)];

         return $name;
      }



      //inserting query for the difference 
      $total_users_needed = $total_votes - $rows1;
      for ($i = 0; $i < $total_users_needed; $i++) {
         $name = randomName();
         $email = generateRandomString(5) . '@gmail.com';
         $password = generateRandomString();

         $timestamp = time();
         $query2  = "INSERT INTO `users`(`id`, `user_role`, `name`, `email`, `password`, `timestamp`)
         VALUES (NULL,4,'$name','$email','$password',$timestamp)";


         if ($con->query($query2) === TRUE) {
         }
      }
   }



   //at this point we have total fake accounts we needed to calculate


   //counting vote count in scam table
   $query5 = "SELECT `votes_count` FROM `scams` WHERE `id` = $scam_id";
   $run_fetch5 = mysqli_query($con, $query5);
   $no_of_row5  = mysqli_num_rows($run_fetch5);
   if ($no_of_row5 > 0 && $run_fetch5 == TRUE) {
      while ($data5 = mysqli_fetch_assoc($run_fetch5)) {
         $votes_count = $data5['votes_count'];
      }
   }

   $query3    = "SELECT * FROM `users` WHERE `user_role` = 4 LIMIT $total_votes";
   $run_fetch3 = mysqli_query($con, $query3);
   $no_of_row3  = mysqli_num_rows($run_fetch3);
   if ($no_of_row3 > 0 && $run_fetch3 == TRUE) {
      while ($data3 = mysqli_fetch_assoc($run_fetch3)) {
         $voter_id = $data3['id'];

         //deciding vote
         $vote = 1;
         if ($up_votes > 0) {
            $vote = 1;
            $vote_description = "Thank you for reporting!";
            $up_votes--;
         } else {
            $vote = 0;
            $vote_description = "This is not a valid scam.";
            $down_votes--;
         }

         $timestamp = time();



         //insert vote
         $query4 = "INSERT INTO `votes`(`id`, `voter_id`, `scam_id`, `vote`,
            `vote_description`, `timestamp`) VALUES (NULL,$voter_id,$scam_id,$vote,'$vote_description',$timestamp)";

         if ($con->query($query4) === true) {
            $votes_count++;
         }





         //updating votes count 
         $query6 = "UPDATE `scams` SET `votes_count`=$votes_count WHERE `id` = $scam_id";


         if ($con->query($query6) === true) {
         }
      }
   }






   //increase votes count 




}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="keywords" content="" />
   <meta name="author" content="" />
   <meta name="robots" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="description" content="Griya : Real Estate Admin" />
   <meta property="og:title" content="Griya : Real Estate Admin" />
   <meta property="og:description" content="Griya : Real Estate Admin" />
   <meta property="og:image" content="page-error-404.html" />
   <meta name="format-detection" content="telephone=no" />
   <!-- PAGE TITLE HERE -->
   <title>Active Scams - Tesla INU</title>
   <!-- FAVICONS ICON -->
   <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
   <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
   <link rel="stylesheet" href="../../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
   <!-- Style css -->
   <link href="../../assets/css/style.css" rel="stylesheet" />
   <!-- Datatable -->
   <link href="../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
   <!-- Custom Stylesheet -->
   <link href="../../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
</head>

<body>
   <div id="preloader">
      <div class="lds-ripple">
         <div></div>
         <div></div>
      </div>
   </div>
   <div id="main-wrapper">
      <?php
      require('../elements/header.php');
      ?>
      <?php
      require('../elements/sidebar.php');
      ?>
      <div class="content-body">
         <!-- row -->
         <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
               <h2 class="mb-3 me-auto">Active Scams </h2>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-6">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Active Scams</h4>
                        <scam class="card-title-desc">Here are the active scams open for mining</scam>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="example" class="display" style="min-width: 845px;">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Scam ID</th>
                                    <th>Reported By</th>
                                    <th>Scam Description</th>
                                    <th class="text-center">View </th>
                                    <th>Mining Started</th>
                                    <th>Total Votes</th>
                                    <th>Voter List</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $query1 = "SELECT * FROM `scams` WHERE `superadmin_approval` = 1 AND `is_active` = 1 AND `superadmin_rejected` = 0";
                                 $runquery1 = mysqli_query($con, $query1);
                                 $rows1 = mysqli_num_rows($runquery1);
                                 $indexing1 = 1;
                                 if (
                                    $rows1 >
                                    0 && $runquery1 == TRUE
                                 ) {
                                    while ($data1 = mysqli_fetch_assoc($runquery1)) { ?>
                                       <tr>
                                          <td><?php echo $indexing1; ?></td>
                                          <td><?php echo $data1['id']; ?></td>
                                          <td><?php
                                                echo '#' . $data1['reported_by'];
                                                echo '<br>';
                                                $reported_by = $data1['reported_by'];
                                                $query2 = "SELECT * FROM `users` WHERE `id` = $reported_by";
                                                $runquery2 = mysqli_query($con, $query2);
                                                $rows2 = mysqli_num_rows($runquery2);
                                                $indexing2 = 2;
                                                if ($rows2 > 0 && $runquery2 == TRUE) {
                                                   while ($data2 = mysqli_fetch_assoc($runquery2)) {
                                                      echo $data2['email'];
                                                   }
                                                }
                                                ?></td>
                                          <td><?php echo $data1['other_information']; ?></td>
                                          <td class="text-center">
                                             <a href="view-scam.php?id=<?php echo $data1['id']; ?>">
                                                <i class="far fa-eye" style="color: #943eff !important; cursor:pointer;" class="text-info"></i>
                                             </a>
                                          </td>
                                          <td>
                                             <?php
                                             $mydate = getdate($data1['superadmin_approval_timestamp']);
                                             echo " " . "$mydate[hours]:$mydate[minutes], ";
                                             echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";

                                             ?>
                                          </td>
                                          <td><?php echo $data1['votes_count']; ?></td>
                                          <td class="text-center">
                                             <a href="../mining/voter-list.php?id=<?php echo $data1['id']; ?>">
                                                <i class="fas fa-crown" style="color: #68e365 !important; cursor:pointer;" class="text-info"></i>
                                             </a>
                                          </td>
                                          <td class="text-center">
                                             <span data-bs-toggle="tooltip" data-bs-placement="top" title="Add Votes" onclick="addVotes('<?php echo $data1['id']; ?>');">
                                                <i class="fas fa-vote-yea text-primary" class="text-info" data-bs-toggle="modal" data-bs-target="#add_votes"></i>
                                             </span>
                                          </td>
                                       </tr>
                                 <?php
                                       $indexing1++;
                                    }
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php require('../elements/footer.php'); ?>
      </div>
   </div>


   <div class="modal fade" id="add_votes">
      <div class="modal-dialog  modal-md modal-dialog-centered">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Add Votes
               </h4>
               <span type="button" class="close" data-bs-dismiss="modal">&times;</span>
            </div>
            <form action="" method="POST">
               <input type="hidden" name="scam_id" id="add_votes_scam_id_input_hidden">
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <label>Total Votes</label>
                           <input class="form-control" name="total_votes" id="total_votes_modal_input" placeholder="Enter Total Votes" type="number" data-original-title="" title="" required>
                        </div>
                     </div>
                  </div>
                  <br><br>
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label>Up Votes</label>
                           <input class="form-control" name="up_votes" id="up_votes_modal_input" placeholder="Enter Up Votes" type="number" data-original-title="" title="" required>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label>Down Votes</label>
                           <input class="form-control" name="down_votes" id="down_votes_modal_input" placeholder="Enter Down Votes" type="number" data-original-title="" title="" required>
                        </div>
                     </div>

                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="add_votes" class="btn btn-primary">Add Votes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="../../assets/vendor/global/global.min.js"></script>
   <script src="../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
   <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
   <!-- Apex Chart -->
   <script src="../../assets/vendor/apexchart/apexchart.js"></script>
   <!-- Chart piety plugin files -->
   <script src="../../assets/vendor/peity/jquery.peity.min.js"></script>
   <!-- Dashboard 1 -->
   <script src="../../assets/js/dashboard/dashboard-1.js"></script>
   <!-- JS for dotted map -->
   <script src="../../assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
   <script src="../../assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
   <script src="../../assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
   <script src="../../assets/vendor/dotted-map/js/world.js"></script>
   <script src="../../assets/vendor/dotted-map/js/smallimap.js"></script>
   <script src="../../assets/js/dashboard/dotted-map-init.js"></script>
   <script src="../../assets/js/custom.min.js"></script>
   <script src="../../assets/js/deznav-init.js"></script>
   <script src="../../assets/js/demo.js"></script>
   <!-- <script src="../../assets/js/styleSwitcher.js"></script> -->
   <!-- Datatable -->
   <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
   <script src="../../assets/js/plugins-init/datatables.init.js"></script>
   <script src="../../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
</body>

</html>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>
<script>
   $(function() {
      $('[data-toggle="tooltip"]').tooltip()
   })
</script>

<script>
   function addVotes(scam_id) {
      var get_add_votes_scam_id_input_hidden = document.getElementById('add_votes_scam_id_input_hidden');
      get_add_votes_scam_id_input_hidden.value = scam_id;

   }
</script>