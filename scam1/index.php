<?php 
   require_once 'database/db-con.php';
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
                     <div class="row" >
                        <div class="col-xl-8">
                           <!--begin::Nav Panel Widget 1-->
                           <div class="card card-custom gutter-b card-stretch card-shadowless" style="background-color:transparent !important;"  >
                              <!--begin::Body-->
                              <div class="card-body p-0">
                                 <!--begin::Nav Tabs-->
                                 <ul class="dashboard-tabs nav nav-pills nav-primary row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist" style="background:none;">
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                       <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_1">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect x="0" y="0" width="24" height="24"></rect>
                                                      <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                                      <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Scam Database</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                       <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_2">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect x="0" y="0" width="24" height="24"></rect>
                                                      <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                                      <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Mining Dashboard</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                       <a class="nav-link active border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_3">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Media/Movie-Lane2.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect x="0" y="0" width="24" height="24"></rect>
                                                      <path d="M6,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,5 C4,3.8954305 4.8954305,3 6,3 Z M5.5,5 C5.22385763,5 5,5.22385763 5,5.5 L5,6.5 C5,6.77614237 5.22385763,7 5.5,7 L6.5,7 C6.77614237,7 7,6.77614237 7,6.5 L7,5.5 C7,5.22385763 6.77614237,5 6.5,5 L5.5,5 Z M17.5,5 C17.2238576,5 17,5.22385763 17,5.5 L17,6.5 C17,6.77614237 17.2238576,7 17.5,7 L18.5,7 C18.7761424,7 19,6.77614237 19,6.5 L19,5.5 C19,5.22385763 18.7761424,5 18.5,5 L17.5,5 Z M5.5,9 C5.22385763,9 5,9.22385763 5,9.5 L5,10.5 C5,10.7761424 5.22385763,11 5.5,11 L6.5,11 C6.77614237,11 7,10.7761424 7,10.5 L7,9.5 C7,9.22385763 6.77614237,9 6.5,9 L5.5,9 Z M17.5,9 C17.2238576,9 17,9.22385763 17,9.5 L17,10.5 C17,10.7761424 17.2238576,11 17.5,11 L18.5,11 C18.7761424,11 19,10.7761424 19,10.5 L19,9.5 C19,9.22385763 18.7761424,9 18.5,9 L17.5,9 Z M5.5,13 C5.22385763,13 5,13.2238576 5,13.5 L5,14.5 C5,14.7761424 5.22385763,15 5.5,15 L6.5,15 C6.77614237,15 7,14.7761424 7,14.5 L7,13.5 C7,13.2238576 6.77614237,13 6.5,13 L5.5,13 Z M17.5,13 C17.2238576,13 17,13.2238576 17,13.5 L17,14.5 C17,14.7761424 17.2238576,15 17.5,15 L18.5,15 C18.7761424,15 19,14.7761424 19,14.5 L19,13.5 C19,13.2238576 18.7761424,13 18.5,13 L17.5,13 Z M17.5,17 C17.2238576,17 17,17.2238576 17,17.5 L17,18.5 C17,18.7761424 17.2238576,19 17.5,19 L18.5,19 C18.7761424,19 19,18.7761424 19,18.5 L19,17.5 C19,17.2238576 18.7761424,17 18.5,17 L17.5,17 Z M5.5,17 C5.22385763,17 5,17.2238576 5,17.5 L5,18.5 C5,18.7761424 5.22385763,19 5.5,19 L6.5,19 C6.77614237,19 7,18.7761424 7,18.5 L7,17.5 C7,17.2238576 6.77614237,17 6.5,17 L5.5,17 Z" fill="#000000" opacity="0.3"></path>
                                                      <path d="M11.3521577,14.5722612 L13.9568442,12.7918113 C14.1848159,12.6359797 14.2432972,12.3248456 14.0874656,12.0968739 C14.0526941,12.0460053 14.0088196,12.002002 13.9580532,11.9670814 L11.3533667,10.1754041 C11.1258528,10.0189048 10.8145486,10.0764735 10.6580493,10.3039875 C10.6007019,10.3873574 10.5699997,10.4861652 10.5699997,10.5873545 L10.5699997,14.1594818 C10.5699997,14.4356241 10.7938573,14.6594818 11.0699997,14.6594818 C11.1706891,14.6594818 11.2690327,14.6290818 11.3521577,14.5722612 Z" fill="#000000"></path>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Scam Evidence</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                       <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_4">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect x="0" y="0" width="24" height="24"></rect>
                                                      <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                                      <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                                      <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                                      <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Scam Statistics</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                       <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_5">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Shield-check.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <rect x="0" y="0" width="24" height="24"></rect>
                                                      <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                      <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">System Security</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                                       <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_5">
                                          <span class="nav-icon py-2 w-auto">
                                             <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                      <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                      <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                      <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                   </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">24*7 Support</span>
                                       </a>
                                    </li>
                                    <!--end::Item-->
                                 </ul>
                                 <!--end::Nav Tabs-->
                                 <!--begin::Nav Content-->
                                 <div class="tab-content m-0 p-0">
                                    <div class="tab-pane active" id="forms_widget_tab_1" role="tabpanel"></div>
                                    <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel"></div>
                                    <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel"></div>
                                    <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel"></div>
                                    <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel"></div>
                                 </div>
                                 <!--end::Nav Content-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--begin::Nav Panel Widget 1-->
                        </div>
                        <div class="col-xl-4">
                           <!--begin::Engage Widget 8-->
                           <div class="card card-custom gutter-b card-stretch card-shadowless">
                              <div class="card-body p-0 d-flex">
                                 <div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative">
                                    <div class="d-flex flex-column align-items-start flex-grow-1 h-100">
                                       <div class="p-1 flex-grow-1">
                                          <h4 class="text-warning font-weight-bolder">Earn Free TSIT</h4>
                                          <p class="text-dark-50 font-weight-bold mt-3">Report scam and earn free TSIT</p>
                                       </div>
                                       <a href="https://teslainu.com/" class="btn btn-link btn-link-warning font-weight-bold">
                                          Signup to mining
                                          <span class="svg-icon svg-icon-lg svg-icon-warning">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
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
                                    </div>
                                    <div class="position-absolute right-0 bottom-0 overflow-hidden">
                                       <img src="assets/media/illustrations/custom-13.svg" class="mb-n20" style="max-height:275px; margin-right:0px; float:right; margin-left:250px !important; " alt="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--end::Engage Widget 8-->
                        </div>
                     </div>
                     <div class="row my-2">
                        <div class="col-xl-4">
                           <!--begin::Tiles Widget 8-->
                           <div class="card card-custom gutter-b card-stretch">
                              <!--begin::Header-->
                              <div class="card-header border-0 pt-5">
                                 <div class="card-title">
                                    <div class="card-label">
                                       <div class="font-weight-bolder">Weekly TSIT Distribution</div>
                                       <div class="font-size-sm text-muted mt-2">1,890,344 TSIT</div>
                                    </div>
                                 </div>
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body d-flex flex-column p-0" style="position: relative;">
                                 <!--begin::Items-->
                                 <div class="flex-grow-1 card-spacer">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                       <div class="d-flex align-items-center mr-2">
                                          <div class="symbol symbol-40 symbol-light-primary mr-3 flex-shrink-0">
                                             <div class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                   <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Home/Library.svg-->
                                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                         <rect x="0" y="0" width="24" height="24"></rect>
                                                         <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                                         <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                      </g>
                                                   </svg>
                                                   <!--end::Svg Icon-->
                                                </span>
                                             </div>
                                          </div>
                                          <div>
                                             <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Scam Report Reward</a>
                                             <div class="font-size-sm text-muted font-weight-bold mt-1">New scams reported last week</div>
                                          </div>
                                       </div>
                                       <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">12,586 TSIT</div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                       <div class="d-flex align-items-center mr-2">
                                          <div class="symbol symbol-40 symbol-light-warning mr-3 flex-shrink-0">
                                             <div class="symbol-label">
                                                <span class="svg-icon svg-icon-primary svg-icon-warning">
                                                   <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/General/Star.svg-->
                                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                         <polygon points="0 0 24 0 24 24 0 24"/>
                                                         <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                                      </g>
                                                   </svg>
                                                </span>
                                             </div>
                                          </div>
                                          <div>
                                             <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Mining Rewards</a>
                                             <div class="font-size-sm text-muted font-weight-bold mt-1">Reward for mining scam</div>
                                          </div>
                                       </div>
                                       <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">859,888 TSIT</div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                       <div class="d-flex align-items-center mr-2">
                                          <div class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
                                             <div class="symbol-label">
                                                <span class="svg-icon svg-icon-primary svg-icon-success">
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
                                                </span>
                                             </div>
                                          </div>
                                          <div>
                                             <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Mining Fees</a>
                                             <div class="font-size-sm text-muted font-weight-bold mt-1">Fees for mining scams</div>
                                          </div>
                                       </div>
                                       <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">89,596 TSIT</div>
                                    </div>
                                    <!--end::Item-->
                                 </div>
                                 <!--end::Items-->
                                 <!--begin::Chart-->
                                 <!--end::Chart-->
                                 <div class="resize-triggers">
                                    <div class="expand-trigger">
                                       <div style="width: 411px; height: 431px;">
                                       </div>
                                    </div>
                                    <div class="contract-trigger">
                                    </div>
                                 </div>
                              </div>
                              <div class="card-header border-0 pt-5">
                                 <div class="card-title">
                                    <div class="card-label">
                                       <div class="font-weight-bolder">Recent Scam Reports</div>
                                       <div class="font-size-sm text-muted mt-2">99+ New Scams</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-body pt-2">
                                 <!--begin::Item-->
                                 <div class="d-flex flex-wrap align-items-center pb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                       <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo4/dist/assets/media/stock-600x400/img-17.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                       <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">BlueSky Apartments</a>
                                       <span class="text-muted font-weight-bold">2 
                                       votes, 1 
                                       pos, 1 
                                       hour left</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Btn-->
                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                       <span class="svg-icon svg-icon-success">
                                          <span class="svg-icon svg-icon-md">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </a>
                                    <!--end::Btn-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex flex-wrap align-items-center pb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                       <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo4/dist/assets/media/stock-600x400/img-1.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                       <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">Yellow Apartments</a>
                                       <span class="text-muted font-weight-bold">2 
                                       votes, 2 
                                       pos, 1 
                                       hour left</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Btn-->
                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                       <span class="svg-icon svg-icon-success">
                                          <span class="svg-icon svg-icon-md">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </a>
                                    <!--end::Btn-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex flex-wrap align-items-center pb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                       <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo4/dist/assets/media/stock-600x400/img-22.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                       <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">421 Avenue</a>
                                       <span class="text-muted font-weight-bold">3 
                                       votes, 1 
                                       pos, 1 
                                       hour left</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Btn-->
                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                       <span class="svg-icon svg-icon-success">
                                          <span class="svg-icon svg-icon-md">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </a>
                                    <!--end::Btn-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex flex-wrap align-items-center pb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                       <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo4/dist/assets/media/stock-600x400/img-9.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                       <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">Glassbricks</a>
                                       <span class="text-muted font-weight-bold">2 
                                       votes, 2 
                                       pos, 1 
                                       hour left</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Btn-->
                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                       <span class="svg-icon svg-icon-success">
                                          <span class="svg-icon svg-icon-md">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </a>
                                    <!--end::Btn-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex flex-wrap align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                       <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo4/dist/assets/media/stock-600x400/img-11.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                       <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">RollerCoaster</a>
                                       <span class="text-muted font-weight-bold">4 
                                       votes, 3 
                                       pos, 1 
                                       hour left</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Btn-->
                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                       <span class="svg-icon svg-icon-success">
                                          <span class="svg-icon svg-icon-md">
                                             <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                   <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                   <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                </g>
                                             </svg>
                                             <!--end::Svg Icon-->
                                          </span>
                                       </span>
                                    </a>
                                    <!--end::Btn-->
                                 </div>
                                 <!--end::Item-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Tiles Widget 8-->
                        </div>
                        <div class="col-xl-8">
                           <!--begin::Advance Table Widget 10-->
                           <div class="card card-custom gutter-b card-stretch">
                              <!--begin::Header-->
                              <div class="card-header border-0 py-5">
                                 <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Top Scams</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Here you can see top scams of all time</span>
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
                                             <th class="pl-0" style="width: 30px">
                                                <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                                <input type="checkbox" value="1">
                                                <span></span>
                                                </label>
                                             </th>
                                             <th class="pl-0" style="min-width: 120px">Scammer Name</th>
                                             <th style="min-width: 110px">Scammer Email</th>
                                             <th style="min-width: 110px">
                                                <span class="text-info">Date</span>
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                   <!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Navigation/Down-2.svg-->
                                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                         <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                         <rect fill="#000000" opacity="0.3" x="11" y="4" width="2" height="10" rx="1"></rect>
                                                         <path d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999)"></path>
                                                      </g>
                                                   </svg>
                                                   <!--end::Svg Icon-->
                                                </span>
                                             </th>
                                             <th style="min-width: 120px">Wallet Address</th>
                                             <th style="min-width: 120px">Description</th>
                                             <th class="pr-0 text-right" >Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?Php
                                             $query1    = "SELECT * FROM `scams` ORDER BY `id` DESC LIMIT 10";
                                             $run_query1 = mysqli_query($con, $query1);
                                             $rows1     = mysqli_num_rows($run_query1);
                                             $indexing1 = 1;
                                             if ($rows1 > 0 && $run_query1 == TRUE) {
                                              while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                             
                                             ?>
                                          <tr>
                                             <td class="pl-0 py-6">
                                                <label class="checkbox checkbox-lg checkbox-inline">
                                                <input type="checkbox" value="1">
                                                <span></span>
                                                </label>
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
                     <div class="row py-2">
                        <div class="col-12">
                           <h3 class="card-title align-items-start flex-column">
                              <span class="card-label font-weight-bolder text-dark">Top Miners</span>
                              <span class="text-muted mt-3 font-weight-bold font-size-sm">Highest mining rewards winner of last day</span>
                           </h3>
                        </div>
                     </div>
                     <!--begin::Row-->
                     <div class="row">
                        <!--begin::Col-->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                           <!--begin::Card-->
                           <div class="card card-custom gutter-b card-stretch">
                              <!--begin::Body-->
                              <div class="card-body pt-4 mt-4">
                                 <!--begin::Toolbar-->
                                 <!--end::Toolbar-->
                                 <!--begin::User-->
                                 <div class="d-flex align-items-end mb-7">
                                    <!--begin::Pic-->
                                    <div class="d-flex align-items-center">
                                       <!--begin::Pic-->
                                       <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                          <div class="symbol symbol-circle symbol-lg-75 d-none">
                                             <img src="/metronic/theme/html/demo4/dist/assets/media/users/300_1.jpg" alt="image">
                                          </div>
                                          <div class="symbol symbol-lg-75 symbol-circle symbol-primary ">
                                             <span class="font-size-h3 font-weight-boldest">JM</span>
                                          </div>
                                       </div>
                                       <!--end::Pic-->
                                       <!--begin::Title-->
                                       <div class="d-flex flex-column">
                                          <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">Luca Doncic</a>
                                          <span class="text-muted font-weight-bold">Top miner of 21/10</span>
                                       </div>
                                       <!--end::Title-->
                                    </div>
                                    <!--end::Title-->
                                 </div>
                                 <!--end::User-->
                                 <!--begin::Desc-->
                                 <p class="mb-7">
                                 </p>
                                 <!--end::Desc-->
                                 <!--begin::Info-->
                                 <div class="mb-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                       <span class="text-dark-75 font-weight-bolder mr-2">Mining Since:</span>
                                       <a href="#" class="text-muted text-hover-primary">luca@festudios.com</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                       <span class="text-dark-75 font-weight-bolder mr-2">Total TSIT Earned:</span>
                                       <a href="#" class="text-muted text-hover-primary">44(76)34254578</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                       <span class="text-dark-75 font-weight-bolder mr-2">Total Scams:</span>
                                       <span class="text-muted font-weight-bold">Barcelona</span>
                                    </div>
                                 </div>
                                 <!--end::Info-->
                                 <a href="#" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">
                                 View Scams
                                 </a>
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Card-->
                        </div>
                     </div>
                     <!--end::Row-->
                     <!--begin::Row-->
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