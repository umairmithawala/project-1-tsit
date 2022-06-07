<?php 
   require_once 'database/db-con.php'
   ?>
<?php 
   if (!empty($_GET['id'])) {
       $scam_id = $_GET['id'];
   }else {
       ?>
<script> 
   window.history.back();
</script>
<?php
   }
   
   $query1 = "SELECT * FROM `scams` WHERE `id` = $scam_id; ";
   $run_query1 = mysqli_query($con, $query1);
   $rows1     = mysqli_num_rows($run_query1);
   
   if ($rows1 > 0 && $run_query1 == TRUE) {
       while ($data1 = mysqli_fetch_assoc($run_query1)) {
        $scams_id = $data1['id'];
        $scams_reported_by = $data1['reported_by'];
        $scams_name = $data1['name'];
        $scams_email = $data1['email'];
        $scams_phone = $data1['phone'];
        $scams_telegram_id = $data1['telegram_id'];
        $scams_telegram_bio = $data1['telegram_bio'];
        $scams_crypto_currency_demanded = $data1['crypto_currency_demanded'];
        $scams_wallet_address = $data1['wallet_address'];
        $scams_website = $data1['website'];
        $scams_other_information = $data1['other_information'];
        $scams_profile_image = $data1['profile_image'];
        $scams_screenshot_of_chat = $data1['screenshot_of_chat'];
        $scams_mining_result = $data1['mining_result'];
        $scams_is_active = $data1['is_active'];
        $scams_superadmin_approval = $data1['superadmin_approval'];
        $scams_superadmin_approval_timestamp = $data1['superadmin_approval_timestamp'];
        $scams_superadmin_rejected = $data1['superadmin_rejected'];
        $scams_votes_count = $data1['votes_count'];
        $scams_timestamp = $data1['timestamp'];
           
   }
   }
   
   
   $scams_up_votes = 0;
   //counting up votes 
   
   $query1 = "SELECT * FROM `votes` WHERE `scam_id` = $scam_id AND `vote` = 1; ";
   $run_query1 = mysqli_query($con, $query1);
   $rows1     = mysqli_num_rows($run_query1);
   if ($rows1 > 0 && $run_query1 == TRUE) {
       $scams_up_votes = $rows1;
   }else{
    $scams_up_votes = 0;
   
   }
   
   
   
   $scams_down_votes = 0;
   //counting down votes 
   
   $query1 = "SELECT * FROM `votes` WHERE `scam_id` = $scam_id AND `vote` = 0; ";
   $run_query1 = mysqli_query($con, $query1);
   $rows1     = mysqli_num_rows($run_query1);
   if ($rows1 > 0 && $run_query1 == TRUE) {
       $scams_down_votes = $rows1;
   }else{
    $scams_down_votes = 0;
   }
   
   
   
   
   //counting down votes 
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Scam View | scamscan.org</title>
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
            <div class="row ">
               <div class="col-md-4">
                  <div class="card card-custom bg-light-success card-shadowless gutter-b">
                     <!--begin::Body-->
                     <div class="card-body my-3">
                        <a href="#" class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">Up Votes</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                           <span class="text-dark-75 font-size-h2 font-weight-bolder mr-2">
                           <?php
                              echo $scams_up_votes."%";
                                                         ?>
                           </span> 
                           <?php
                              if($scams_up_votes > 99){
                              echo "0";
                              }else{ 
                              
                                  echo 51 - $scams_up_votes;
                                  echo "%";
                              }
                              
                              ?>
                           needs to be valid
                        </div>
                        <div class="progress progress-xs mt-7 bg-success-o-60">
                           <div class="progress-bar bg-success" role="progressbar" style="width: <?php
                              echo $scams_up_votes."%";
                                                         ?>;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                     <!--end:: Body-->
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card card-custom bg-light-warning card-shadowless gutter-b">
                     <!--begin::Body-->
                     <div class="card-body my-4">
                        <a href="#" class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block">Down Votes</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                           <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">
                           <?php
                              echo $scams_down_votes."%";
                                                         ?>
                           </span> 
                           <?php
                              if($scams_down_votes > 99){
                              echo "0";
                              }else{ 
                              
                                  echo 51 - $scams_down_votes;
                                  echo "%";
                              }
                              
                              ?>
                           needs to be invalid
                        </div>
                        <div class="progress progress-xs mt-7 bg-warning-o-60">
                           <div class="progress-bar bg-warning" role="progressbar" style="width: <?php
                              echo $scams_down_votes."%";
                                                         ?>;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                     <!--end::Body-->
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card card-custom bg-light-info card-shadowless gutter-b">
                     <!--begin::Body-->
                     <div class="card-body my-4">
                        <a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Votes</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                           <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">
                           <?php
                              echo $scams_up_votes + $scams_down_votes;
                              echo "%";
                              
                              ?>
                           </span>100% to goal
                        </div>
                        <div class="progress progress-xs mt-7 bg-info-o-60">
                           <div class="progress-bar bg-info" role="progressbar" style="width: <?php
                              echo $scams_up_votes + $scams_down_votes;
                              echo "%";
                              
                              ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                     <!--end::Body-->
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="card card-custom gutter-b">
                     <div class="card-body">
                        <div class="d-flex">
                           <!--begin: Pic-->
                           <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                              <div class="symbol symbol-50 symbol-lg-120 d-none">
                                 <img alt="Pic" src="/metronic/theme/html/demo6/dist/assets/media/project-logos/3.png">
                              </div>
                              <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">
                                 <span class="font-size-h3 symbol-label font-weight-boldest">SC</span>
                              </div>
                           </div>
                           <!--end: Pic-->
                           <!--begin: Info-->
                           <div class="flex-grow-1">
                              <!--begin: Title-->
                              <div class="d-flex align-items-center justify-content-between flex-wrap">
                                 <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                    <?php
                                       if($scams_name != NULL || $scams_name != ""){
                                           echo $scams_name;
                                       }else{
                                           echo "Not Available";
                                       }
                                       
                                       ?>
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                    <div class="d-flex flex-wrap my-2">
                                       <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                          <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"></rect>
                                                   <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                   <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                          <?php
                                             if($scams_email != NULL || $scams_email != ""){
                                                 echo $scams_email;
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                       </a>
                                       <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                          <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                             <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Devices/Phone.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"/>
                                                   <path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/>
                                                   <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/>
                                                   <circle fill="#000000" cx="12" cy="21" r="1"/>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                          <?php
                                             if($scams_phone != NULL || $scams_phone != ""){
                                                 echo $scams_phone;
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                       </a>
                                    </div>
                                    <!--end::Contacts-->
                                 </div>
                                 <div class="my-lg-0 my-1">
                                    <?php
                                       if($scams_mining_result == 1){
                                           ?>
                                    <a href="#" class="btn btn-sm btn-success font-weight-bolder text-uppercase">Verified</a>
                                    <?php
                                       }else{
                                           ?>
                                    <a href="#" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">Not Verified</a>
                                    <?php
                                       }
                                       
                                       
                                       ?>
                                 </div>
                              </div>
                              <!--end: Title-->
                              <!--begin: Content-->
                              <div class="d-flex align-items-center flex-wrap justify-content-between">
                                 <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    <p style="max-width:600px !important;">
                                       <?php
                                          if($scams_other_information != NULL || $scams_other_information != ""){
                                              echo $scams_other_information;
                                          }else{
                                              echo "Not Available";
                                          }
                                          
                                          ?>
                                    </p>
                                 </div>
                                 <br>
                                 <br>
                                 <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                       <div class="mr-6">
                                          <div class="font-weight-bold mb-2">Report Date</div>
                                          <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">
                                          <?php
                                             if($scams_timestamp != NULL || $scams_timestamp != ""){
                                                 $mydate = getdate($scams_timestamp);
                                                                                                echo "$mydate[mday] $mydate[month] $mydate[year] ";
                                                                                                echo "|";
                                                                                                echo " " . "$mydate[hours]:$mydate[minutes]";
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                          </span>
                                       </div>
                                       <div class="">
                                          <div class="font-weight-bold mb-2">Approval Date</div>
                                          <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                          <?php
                                             if($scams_superadmin_approval_timestamp != NULL || $scams_superadmin_approval_timestamp != ""){
                                                 $mydate = getdate($scams_superadmin_approval_timestamp);
                                                                                                echo "$mydate[mday] $mydate[month] $mydate[year] ";
                                                                                                echo "|";
                                                                                                echo " " . "$mydate[hours]:$mydate[minutes]";
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">
                                       <span class="font-weight-bold">Votes Count</span>
                                       <div class="progress progress-xs mt-2 mb-2">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: <?php
                                             if($scams_votes_count != NULL || $scams_votes_count != ""){
                                                 echo $scams_votes_count."%";
                                             }else{
                                                 echo "0%";
                                             }
                                             
                                             ?>;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <span class="font-weight-bolder text-dark">
                                       <?php
                                          if($scams_votes_count != NULL || $scams_votes_count != ""){
                                              echo $scams_votes_count."%";
                                          }else{
                                              echo "Not Available";
                                          }
                                          
                                          ?>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <!--end: Content-->
                           </div>
                           <!--end: Info-->
                        </div>
                        <div class="d-flex">
                           <!--begin: Pic-->
                           <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                              <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">
                                 <span class="font-size-h3 symbol-label font-weight-boldest" style="background:none;">SC</span>
                              </div>
                           </div>
                           <!--end: Pic-->
                           <!--begin: Info-->
                           <div class="flex-grow-1">
                              <!--begin: Title-->
                              <div class="d-flex align-items-center justify-content-between flex-wrap">
                                 <div class="mr-3">
                                    <!--begin::Name-->
                                    <div class="d-flex flex-wrap ">
                                       <div class="d-flex align-items-center mr-10">
                                          <div class="mr-6">
                                             <div class="font-weight-bold mb-2">Wallet Address</div>
                                             <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">
                                             <?php
                                                if($scams_wallet_address != NULL || $scams_wallet_address != ""){
                                                    echo $scams_wallet_address;
                                                }else{
                                                    echo "Not Available";
                                                }
                                                
                                                ?>
                                             </span>
                                          </div>
                                          <div class="">
                                             <div class="font-weight-bold mb-2">Currency</div>
                                             <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">
                                             <?php
                                                if($scams_crypto_currency_demanded != NULL || $scams_crypto_currency_demanded != ""){
                                                    echo $scams_crypto_currency_demanded;
                                                }else{
                                                    echo "Not Available";
                                                }
                                                
                                                ?>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <!--end::Contacts-->
                                 </div>
                              </div>
                           </div>
                           <!--end: Info-->
                        </div>
                        <div class="d-flex">
                           <!--begin: Pic-->
                           <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                              <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">
                                 <span class="font-size-h3 symbol-label font-weight-boldest" style="background:none;"></span>
                              </div>
                           </div>
                           <!--end: Pic-->
                           <!--begin: Info-->
                           <div class="flex-grow-1">
                              <!--begin: Title-->
                              <div class="d-flex align-items-center justify-content-between flex-wrap">
                                 <div class="mr-3">
                                    <div class="d-flex flex-wrap my-2">
                                       <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                          <span class="ssvg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                             <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Home/Globe.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"/>
                                                   <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero"/>
                                                   <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"/>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                          <?php
                                             if($scams_website != NULL || $scams_website != ""){
                                                 echo $scams_website;
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                       </a>
                                    </div>
                                    <div class="d-flex flex-wrap my-2">
                                       <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                          <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                             <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Map/Location-arrow.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"/>
                                                   <path d="M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                          <?php
                                             if($scams_telegram_id != NULL || $scams_telegram_id != ""){
                                                 echo "@".$scams_telegram_id;
                                             }else{
                                                 echo "Not Available";
                                             }
                                             
                                             ?>
                                       </a>
                                    </div>
                                    <!--end::Contacts-->
                                 </div>
                              </div>
                              <!--end: Title-->
                              <!--begin: Content-->
                              <div class="d-flex align-items-center flex-wrap justify-content-between">
                                 <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    <p style="max-width:600px !important;">
                                       Telegram Bio : 
                                       <?php
                                          if($scams_telegram_bio != NULL || $scams_telegram_bio != ""){
                                              echo $scams_telegram_bio;
                                          }else{
                                              echo "Not Available";
                                          }
                                          
                                          ?>
                                    </p>
                                 </div>
                              </div>
                              <!--end: Content-->
                           </div>
                           <!--end: Info-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
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
                        <div class="row">
                           <div class="col-md-4 my-4">
                              <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo6/dist/assets/media/stock-900x600/3.jpg)"></div>
                           </div>
                           <?php 
                              $screenshot_of_chat_array = explode (",", $scams_screenshot_of_chat);  
                              $no_of_screenshot_of_chat =  sizeof($screenshot_of_chat_array);
                              for($i= 0; $i < $no_of_screenshot_of_chat-1; $i++){
                                                                       
                               $akc_screenshot_of_chat = trim($screenshot_of_chat_array[$i]);
                              
                              
                              ?>
                           <div class="col-md-4 my-4">
                              <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url(https://teslainu.com/portal/uploads/scam/scam-documents/<?php echo $akc_screenshot_of_chat; ?>)"></div>
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                     <!--end::Body-->
                  </div>
                  <!--end::Advance Table Widget 3-->
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <!--begin::Advance Table Widget 3-->
                  <div class="card card-custom card-stretch gutter-b">
                     <!--begin::Header-->
                     <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                           <span class="card-label font-weight-bolder text-dark">Voter List</span>
                           <span class="text-muted mt-3 font-weight-bold font-size-sm">Here you can see the voter list</span>
                        </h3>
                        <div class="card-toolbar">
                           <a href="http://teslainu.com/" class="btn btn-success font-weight-bolder font-size-sm">
                              <span class="svg-icon svg-icon-md svg-icon-white">
                                 <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Home/Flower2.svg-->
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <polygon points="0 0 24 0 24 24 0 24"/>
                                       <circle fill="#000000" opacity="0.3" cx="15" cy="17" r="5"/>
                                       <circle fill="#000000" opacity="0.3" cx="9" cy="17" r="5"/>
                                       <circle fill="#000000" opacity="0.3" cx="7" cy="11" r="5"/>
                                       <circle fill="#000000" opacity="0.3" cx="17" cy="11" r="5"/>
                                       <circle fill="#000000" opacity="0.3" cx="12" cy="7" r="5"/>
                                    </g>
                                 </svg>
                                 <!--end::Svg Icon-->
                              </span>
                              Vote Now
                           </a>
                        </div>
                     </div>
                     <!--end::Header-->
                     <!--begin::Body-->
                     <div class="card-body pt-0 pb-3">
                        <!--begin::Table-->
                        <div class="table-responsive">
                           <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                              <thead>
                                 <tr class="text-uppercase">
                                    <th style="min-width: 250px" class="pl-7">
                                       <span class="text-dark-75">Name</span>
                                    </th>
                                    <th style="min-width: 100px">Description</th>
                                    <th style="min-width: 100px">Vote</th>
                                    <th >Date</th>
                                    <th style="min-width: 150px" class="text-right">POS</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $query1    = "SELECT * FROM `votes` WHERE `scam_id` = $scam_id ORDER BY `timestamp` ASC";
                                    $run_query1 = mysqli_query($con, $query1);
                                    $rows1     = mysqli_num_rows($run_query1);
                                    $indexing1 = 1;
                                    if ($rows1 > 0 && $run_query1 == TRUE) {
                                        while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                             $voter_id = $data1['voter_id'];
                                    
                                            $vote    = $data1['vote'];
                                            $vote_description  = $data1['vote_description'];
                                            $vote_time   = $data1['timestamp'];
                                           
                                            //getting voter details
                                    
                                            $query2    = "SELECT `id`,`name`,`user_img` FROM `users` WHERE `id` = $voter_id";
                                            $run_query2 = mysqli_query($con, $query2);
                                            $rows2     = mysqli_num_rows($run_query2);
                                            $indexing2 = 2;
                                            if ($rows2 > 0 && $run_query2 == TRUE) {
                                                while ($data2 = mysqli_fetch_assoc($run_query2)) {
                                                      $voter_name = $data2['name'];
                                                      $voter_user_img = $data2['user_img'];
                                                      $voter_user_id = $data2['id'];
                                                      ?>
                                 <tr>
                                    <td class="pl-0 py-8">
                                       <div class="d-flex align-items-center">
                                          <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                             <div class="symbol-label" style="background-image: url('https://teslainu.com/portal/uploads/users/profile-img/<?php echo $voter_user_img; ?>')"></div>
                                          </div>
                                          <div>
                                             <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"><?php echo $voter_name; ?></a>
                                             <!-- <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span> -->
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <span class="text-muted font-weight-bold"><?php echo $vote_description; ?></span>
                                    </td>
                                    <td>
                                       <?php 
                                          if($vote == 1){
                                             ?>
                                       <span class="label label-lg label-light-success label-inline">Approved</span>
                                       <?php
                                          }else{
                                              ?>
                                       <span class="label label-lg label-light-danger label-inline">Not Approved</span>
                                       <?php
                                          }
                                             ?>
                                    </td>
                                    <td class="text-muted">
                                       <?php $mydate=getdate($vote_time);
                                          echo " "."$mydate[hours]:$mydate[minutes], ";
                                          echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";?>
                                    </td>
                                    <td class="text-right pr-0">
                                       <a href="view-pos.php?uid=<?php echo $voter_user_id; ?>&sid=<?php echo $scam_id; ?>">
                                          <span class="svg-icon svg-icon-md svg-icon-primary">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo6/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </a>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    }
                                    $indexing1++;
                                    }
                                    
                                    }else{
                                    ?>
                                 <tr>
                                    <td class="text-center">No votes yet</td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
                              </tbody>
                           </table>
                        </div>
                        <!--end::Table-->
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