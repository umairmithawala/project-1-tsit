<?php
   require_once 'database/db-con.php';
   
   if (isset($_POST['search'])) {
       $search_keyword = $_POST['search'];
   
   }else {
       ?>
<script> 
   window.history.back();
</script>
<?php
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Home | scamscan.org</title>
      <meta name="description" content="" />
      <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/footer-css.css" rel="stylesheet" type="text/css" />
      <script src="https://kit.fontawesome.com/12af21ff9f.js" crossorigin="anonymous"></script>
   </head>
   <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-secondary-disabled">
      <div class="d-flex flex-column flex-root">
         <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
               <?php
                  require_once('elements/header.php');                  
                        ?>
               <?php
                  require_once('elements/search-section.php');                  
                  ?>
               <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                  <div class="container-fluid" id="kt_content_container">
                     <div class="row my-2">
                        <div class="col-xl-12">
                           <!--begin::Advance Table Widget 10-->
                           <div class="card card-custom gutter-b card-stretch">
                              <!--begin::Header-->
                              <div class="card-header border-0 py-5">
                                 <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Search results for <?php echo '"'.$search_keyword.'"'; ?></span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Here you can see all matched results.</span>
                                 </h3>
                                 <div class="card-toolbar">
                                    <a href="http://teslainu.com/" class="btn btn-info font-weight-bolder font-size-sm">New Report</a>
                                 </div>
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body py-0">
                                 <!--begin::Table-->
                                 <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                                       <thead>
                                          <tr class="text-left">
                                             <th>#</th>
                                             <th class="pl-0" style="min-width: 120px">Scammer Name</th>
                                             <th style="min-width: 110px">Scammer Contact</th>
                                             <th style="min-width: 110px">Date</th>
                                             <th style="">Crypto Demanded</th>
                                             <th style="min-width: 120px">Wallet Address</th>
                                             <th style="min-width: 120px">Description</th>
                                             <th style="">Website</th>
                                             <th style="min-width: 120px">Telegram Info</th>
                                             <th class="pr-0 text-right" >Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?Php
                                             $query1 = "SELECT * FROM `scams` WHERE `reported_by` LIKE '%$search_keyword%' OR `name` LIKE '%$search_keyword%' OR `email` LIKE '%$search_keyword%' OR `phone` LIKE '%$search_keyword%' OR `telegram_id` LIKE '%$search_keyword%' OR `telegram_bio` LIKE '%$search_keyword%' OR `crypto_currency_demanded` LIKE '%$search_keyword%' OR `wallet_address` LIKE '%$search_keyword%' OR `website` LIKE '%$search_keyword%' OR `other_information` LIKE '%$search_keyword%' AND `is_active` = 0 AND `superadmin_approval` = 1";
                                             $run_query1 = mysqli_query($con, $query1);
                                             $rows1     = mysqli_num_rows($run_query1);
                                             $indexing1 = 1;
                                             if ($rows1 > 0 && $run_query1 == TRUE) {
                                              while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                             
                                             ?>
                                          <tr>
                                             <td class="pl-0">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                                <?php echo $indexing1; ?>
                                                </a>
                                             </td>
                                             <td class="pl-0">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                                <?php echo $data1['name']; ?>
                                                </a>
                                             </td>
                                             <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $data1['email']; ?></span>
                                                <?php
                                                   if($data1['phone'] != NULL || $data1['phone'] != ""){
                                                   	?>
                                                <span class="text-muted font-weight-bold"><?php echo "(".$data1['phone'].")"; ?></span>
                                                <?php
                                                   }
                                                   
                                                   
                                                   ?>
                                             </td>
                                             <td>
                                                <span class="text-info font-weight-bolder d-block font-size-lg">
                                                <?php
                                                   $mydate = getdate($data1['timestamp']);
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year] ";
                                                   echo " " . "$mydate[hours]:$mydate[minutes]";
                                                   ?>
                                                </span>
                                                <span class="text-muted font-weight-bold">Report Date</span>
                                             </td>
                                             <td>
                                                <span class="text-danger font-weight-bolder d-block font-size-lg">
                                                <?php
                                                   if($data1['crypto_currency_demanded'] != NULL || $data1['crypto_currency_demanded'] != ""){
                                                       echo $data1['crypto_currency_demanded'];
                                                   } else{
                                                       ?>
                                                <span class="text-muted font-weight-bold">Not Available</span>
                                                <?php
                                                   }
                                                   
                                                   ?>
                                                </span>
                                             </td>
                                             <td>
                                                <span class="label label-lg label-light-danger label-inline">
                                                <?php echo $data1['wallet_address']; ?>
                                                </span>
                                             </td>
                                             <td>
                                                <?php
                                                   if($data1['other_information'] != NULL || $data1['other_information'] != ""){
                                                   	?>
                                                <span class="text-muted font-weight-bold"><?php echo $data1['other_information']; ?></span>
                                                <?php
                                                   }else{
                                                   	?>
                                                <span class="text-muted font-weight-bold">Not Available</span>
                                                <?php
                                                   }
                                                   
                                                   												 ?>
                                             </td>
                                             <td>
                                                <span class="text-info  d-block font-size-lg">
                                                <?php
                                                   if($data1['website'] != NULL || $data1['website'] != ""){
                                                       echo $data1['website'];
                                                   } else{
                                                       ?>
                                                <span class="text-muted font-weight-bold">Not Available</span>
                                                <?php
                                                   }
                                                   
                                                   ?>
                                                </span>
                                             </td>
                                             <td>
                                                <div class="d-flex flex-wrap align-items-center pb-10">
                                                   <!--begin::Symbol-->
                                                   <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                                      <div class="symbol-label" style="background-image: url(<?php echo "https://teslainu.com/portal/uploads/scams/scam-documents".$data['profile_image']; ?>)"></div>
                                                   </div>
                                                   <!--end::Symbol-->
                                                   <!--begin::Title-->
                                                   <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                                      <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">
                                                      <?php
                                                         if($data1['telegram_id'] != NULL || $data1['telegram_id'] != ""){
                                                             echo $data1['telegram_id'];
                                                         } else{
                                                             ?>
                                                      <span class="text-muted font-weight-bold">Not Available</span>
                                                      <?php
                                                         }
                                                         ?>
                                                      </a>
                                                      <span class="text-muted font-weight-bold">
                                                      <?php
                                                         if($data1['telegram_bio'] != NULL || $data1['telegram_bio'] != ""){
                                                             echo $data1['telegram_bio'];
                                                         } else{
                                                             ?>
                                                      <span class="text-muted font-weight-bold">Not Available</span>
                                                      <?php
                                                         }
                                                         ?>
                                                      </span>
                                                   </div>
                                                   <!--end::Title-->
                                                </div>
                                             </td>
                                             <td class="pr-0 text-right">
                                                <a href="view-scam.php?id=<?php echo $data1['id']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                   <span class="svg-icon svg-icon-md svg-icon-primary">
                                                      <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Communication/Send.svg-->
                                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                                                         </g>
                                                      </svg>
                                                      <!--end::Svg Icon-->
                                                   </span>
                                                </a>
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
                                 <!--end::Table-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Advance Table Widget 10-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
         require_once('elements/footer.php');         
         ?>
      <script src="assets/plugins/global/plugins.bundle.js"></script>
      <script src="assets/js/scripts.bundle.js"></script>
      <script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
      <script src="assets/js/custom/modals/select-location.js"></script>
      <script src="assets/js/custom/widgets.js"></script>
      <script src="assets/js/custom/apps/chat/chat.js"></script>
      <script src="assets/js/custom/modals/create-app.js"></script>
      <script src="assets/js/custom/modals/upgrade-plan.js"></script>
      <script src="assets/js/custom/intro.js"></script>
      <script src="assets/js/script5.js"></script>
   </body>
</html>