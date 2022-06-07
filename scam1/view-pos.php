<?php 
   require_once 'database/db-con.php'
   ?>
<?php
   if (!empty($_GET['uid']) && !empty($_GET['sid'])) {
       $voter_user_id = $_GET['uid'];
       $scam_id = $_GET['sid'];
   } else {
   ?>
<script>
   window.history.back();
</script>
<?php
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Scam POS | scamscan.org</title>
      <meta name="description" content="" />
      <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/footer-css.css" rel="stylesheet" type="text/css" />
      <script src="https://kit.fontawesome.com/12af21ff9f.js" crossorigin="anonymous"></script>
   </head>
   <!--begin::Body-->
   <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-secondary-disabled">
      <!--begin::Main-->
      <!--begin::Root-->
      <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
      <?php
         require_once('elements/header.php');
         
               ?>
      <?php
         require_once('elements/search-section.php');
         
         ?>
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
         <div class="container-fluid" id="kt_content_container">
            <div class="row">
               <div class="col-lg-12">
                  <!--begin::Advance Table Widget 3-->
                  <div class="card card-custom card-stretch gutter-b">
                     <!--begin::Header-->
                     <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                           <span class="card-label font-weight-bolder text-dark">Scam Proofs</span>
                           <span class="text-muted mt-3 font-weight-bold font-size-sm">Here you can see images of scam</span>
                        </h3>
                     </div>
                     <!--end::Header-->
                     <!--begin::Body-->
                     <div class="card-body pt-0 pb-3">
                        <?php
                           $query1    = "SELECT * FROM `pos` WHERE `user_id` = $voter_user_id  AND `scam_id` = $scam_id";
                           $run_query1 = mysqli_query($con, $query1);
                           $rows1     = mysqli_num_rows($run_query1);
                           $indexing1 = 1;
                           if ($rows1 > 0 && $run_query1 == TRUE) {
                               while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                   ?>
                        <div class="row py-4">
                           <div class="col-md-12 ">
                              <h5>
                                 <?php 
                                    echo ucwords($data1['proof_of']);
                                    ?>
                              </h5>
                           </div>
                           <?php 
                              $pos_file_array = explode (",", $data1['file_name']);  
                              $no_of_pos_file =  sizeof($pos_file_array);
                              
                              if($no_of_pos_file < 0){
                                  ?>
                           <div class="col-md-4 py-2 text-center ">
                              No Document
                           </div>
                           <?php
                              }
                              
                              for($i= 0; $i < $no_of_pos_file-1; $i++){
                                                                       
                              
                               $akc_pos_file = trim($pos_file_array[$i]);
                              
                              
                              ?>
                           <div class="col-md-4 my-4">
                              <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url(https://teslainu.com/portal/uploads/scam/pos/<?php echo $akc_pos_file; ?>)"></div>
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                        <?php
                           }
                           }
                           ?>
                     </div>
                     <!--end::Body-->
                  </div>
                  <!--end::Advance Table Widget 3-->
               </div>
            </div>
         </div>
      </div>
      <?php
         require_once('elements/footer.php');
         ?>
      <!--begin::Javascript-->
      <!--begin::Global Javascript Bundle(used by all pages)-->
      <script src="assets/plugins/global/plugins.bundle.js"></script>
      <script src="assets/js/scripts.bundle.js"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Page Vendors Javascript(used by this page)-->
      <script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
      <!--end::Page Vendors Javascript-->
      <!--begin::Page Custom Javascript(used by this page)-->
      <script src="assets/js/custom/modals/select-location.js"></script>
      <script src="assets/js/custom/widgets.js"></script>
      <script src="assets/js/custom/apps/chat/chat.js"></script>
      <script src="assets/js/custom/modals/create-app.js"></script>
      <script src="assets/js/custom/modals/upgrade-plan.js"></script>
      <script src="assets/js/custom/intro.js"></script>
      <!--end::Page Custom Javascript-->
      <!--end::Javascript-->
      <!--Begin::Google Tag Manager (noscript) -->
      <!--End::Google Tag Manager (noscript) -->
   </body>
   <!--end::Body-->
</html>