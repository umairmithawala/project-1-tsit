<?php
   require_once 'database/db-con.php';
   
   if (!empty($_GET['search'])) {
       $search_result = $_GET['search'];
   
   }else {
       ?>
<script> 
   // window.history.back();
</script>
<?php
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title>index</title>
      <meta name="description"
         content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
      <meta name="keywords"
         content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta charset="utf-8" />
      <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="article" />
      <meta property="og:title"
         content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
      <meta property="og:url" content="https://keenthemes.com/metronic" />
      <meta property="og:site_name" content="Keenthemes | Metronic" />
      <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
      <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <!--end::Fonts-->
      <!--begin::Page Vendor Stylesheets(used by this page)-->
      <link href="assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Page Vendor Stylesheets-->
      <!--begin::Global Stylesheets Bundle(used by all pages)-->
      <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Global Stylesheets Bundle-->
      <!--Begin::Google Tag Manager -->
      <script>(function (w, d, s, l, i) { w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' }); var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&amp;l=' + l : ''; j.async = true; j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f); })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
      <!--End::Google Tag Manager -->
   </head>
   <!--end::Head-->
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
      <!--begin::Header-->
      <div id="kt_header" class="header bg-white align-items-stretch">
         <!--begin::Container-->
         <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <!--begin::Aside mobile toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
               <div class="btn btn-icon btn-active-color-primary w-40px h-40px" id="kt_aside_toggle">
                  <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                  <span class="svg-icon svg-icon-2x mt-1">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24" />
                           <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                           <path
                              d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                              fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
               </div>
            </div>
            <!--end::Aside mobile toggle-->
            <!--begin::Mobile logo-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
               <a href="/metronic8/demo4/../demo4/index.html" class="d-lg-none">
                  <!-- <img alt="Logo" src="/metronic8/demo4/assets/media/logos/logo-3.svg" class="h-30px" /> -->
               </a>
            </div>
            <!--end::Mobile logo-->
            <div class="d-flex align-items-center" id="kt_header_wrapper">
               <!--begin::Page title-->
               <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 pb-2 pb-lg-0"
                  data-kt-swapper="true" data-kt-swapper-mode="prepend"
                  data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_wrapper'}">
                  <!--begin::Heading-->
                  <a href="index.php"><img src="assets/media/logos/logo.png" style="max-height: 60px;"></a>
                  <!--end::Heading-->
               </div>
               <!--end::Page title=-->
            </div>
            <!--begin::Wrapper-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
               <!--begin::Navbar-->
               <div class="d-flex align-items-stretch" id="kt_header_nav">
                  <!--begin::Menu wrapper-->
                  <div class="header-menu align-items-stretch" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                     data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                     <!--begin::Menu-->
                     <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-600 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold fs-6 my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div data-kt-menu-placement="bottom-start"
											class="menu-item menu-lg-down-accordion me-lg-1">
											<span class="menu-link py-3">
												<a href="index.php"><span class="menu-title">Top Scams</span></a>
												<span class="menu-arrow d-lg-none"></span>
											</span>
										</div>
                        <div data-kt-menu-placement="bottom-start"
                           class="menu-item menu-lg-down-accordion me-lg-1">
                           <span class="menu-link py-3">
                           <a href="#top-scam-miners"><span class="menu-title">Top Scam Miners</span></a>
                           <span class="menu-arrow d-lg-none"></span>
                           </span>
                        </div>
                        <div data-kt-menu-placement="bottom-start"
                           class="menu-item menu-lg-down-accordion me-lg-1">
                           <span class="menu-link py-3">
                           <span class="menu-title">About Us</span>
                           <span class="menu-arrow d-lg-none"></span>
                           </span>
                        </div>
                     </div>
                     <!--end::Menu-->
                  </div>
                  <!--end::Menu wrapper-->
               </div>
               <!--end::Navbar-->
               <!--begin::Topbar-->
               <div class="d-flex align-items-stretch justify-self-end flex-shrink-0">
                  <div class="d-flex align-items-stretch flex-shrink-0">
                     <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                           data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                           data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                           <div>
                              Login
                           </div>
                           <!--end::Svg Icon-->
                        </div>
                     </div>
                     <!--end::Quick links-->
                     <!--begin::Chat-->
                  </div>
                  <!--end::Toolbar wrapper-->
               </div>
               <!--end::Topbar-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Container-->
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
      <!--begin::Container-->
      <div class="container" id="kt_content_container">
         <!--`begin::Row-->
         <div class="row g-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xxl-4">
               <!--begin::Mixed Widget 5-->
               <!-- Start Details of Top Scams -->
               <div class="card mb-5 mb-xl-8">
                  <!--begin::Header-->
                  <div class="card-header border-0 pt-5">
                     <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Top Scams </span>
                        <span class="text-muted mt-1 fw-bold fs-7">Be aware of following most
                        dangerous and common scams</span>
                     </h3>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body py-3">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                           <!--begin::Table head-->
                           <thead>
                              <tr class="fw-bolder text-muted bg-light">
                                 <th class="ps-4 rounded-start">id</th>`
                                 <th class="min-w-125px">Name</th>
                                 <th class="min-w-125px">Total Amount</th>
                                 <th class="min-w-125px">Address</th>
                                 <th class="min-w-150px">Description</th>
								 <th class="ps-5 min-w-125px rounded-end">Action</th>
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody>
                              <?php
                                 $query = "SELECT * FROM `scams` WHERE `reported_by` LIKE '%$search_result%' OR `name` LIKE '%$search_result%' OR `email` LIKE '%$search_result%' OR `phone` LIKE '%$search_result%' OR `telegram_id` LIKE '%$search_result%' OR `telegram_bio` LIKE '%$search_result%' OR `crypto_currency_demanded` LIKE '%$search_result%' OR `wallet_address` LIKE '%$search_result%' OR `website` LIKE '%$search_result%' OR `other_information` LIKE '%$search_result%'";
                                 $runquery1 = mysqli_query($con, $query);
								 
								 
                                 $rows1     = mysqli_num_rows($runquery1);
                                 
                                  if ($rows1 > 0 && $runquery1 == TRUE) { 
                                     while ($data1 = mysqli_fetch_assoc($runquery1)) { 
                                 $scam_id = $data1['id'];
                                 $scam_name = $data1['name'];
                                 $scam_wallet_address = $data1['wallet_address'];
                                 $scam_other_info = $data1['other_information'];
                                         ?>
                              <tr class="box-shadow-topscams">
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="symbol symbol-50px me-5">
                                          <span class="symbol-label bg-light">
                                          <?php echo $scam_id; ?>
                                          </span>
                                       </div>
                                 <td>
                                 <div class="d-flex justify-content-start flex-column">
                                 <p href="#"
                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                 <?php echo $scam_name; ?>
                                 </p>
                                 </div>
                                 </td>
                                 </div>
                                 </td>
                                 <td>
                                    <p href="#"
                                       class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Not
                                       Applyed
                                    </p>
                                 </td>
                                 <td>
                                    <p href="#"
                                       class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                       <?php echo $scam_wallet_address; ?>
                                    </p>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX
                                    Design</span>
                                 </td>
                                 <td>
                                    <p href="#"
                                       class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">
                                       <?php echo $scam_other_info; ?>
                                    </p>
                                 </td>
                                 <td class="">
                                    <a href="scam_view.php?id=<?php echo $scam_id; ?>"
                                       class="btn btn-bg-light btn-color-muted btn-active-color-primary"
                                       style="width: 50%; margin-right: 50px;">View</a>
                                    <!-- <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a> -->
                                 </td>
                              </tr>
                              <?php
                                 }
                                 } else {
                                //   echo "Error deleting record: " . $con->error;
                                 }
                                 ?>
                           </tbody>
                           <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                     </div>
                     <!--end::Table container-->
                  </div>
                  <!--begin::Body-->
               </div>
            </div>
         </div>
      </div>
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
      <noscript>
         <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
      </noscript>
      <!--End::Google Tag Manager (noscript) -->
   </body>
   <!--end::Body-->
</html>