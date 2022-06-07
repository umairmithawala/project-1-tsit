<?php
session_start();
require_once '../database/db-con.php';
?>
<?php
if (isset($_SESSION['user_session_var'])) {
   $user_id = $_SESSION['user_session_var'];
} else {
   header('location:../auth/login.php');
}

$user_query = "SELECT * FROM `users` WHERE `id` = $user_id";
$run_fetch = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($run_fetch);

if ($user_data['email_verification'] == 0) {
   echo "<script>window.location='../utility/email-not-verified.php';</script>";
}
?>
<?php
//checking if kyc is done 

if ($user_data['kyc_approved'] == 1) {
   header('location:../kyc/kyc-completed.php');
} else if ($user_data['kyc_approved'] == 2) {
   header('location:../kyc/document-submitted.php');
}
?>
<?php
if (isset($_POST['update_kyc'])) {

   $upload_kyc_document_variable =  0;
   $kyc_country = $_POST['kyc_country'];
   $kyc_first_name = $_POST['kyc_first_name'];
   $kyc_last_name = $_POST['kyc_last_name'];
   $kyc_dob = $_POST['kyc_dob'];

   //convert dob date input to timestamp
   $kyc_dob = strtotime($kyc_dob);

   if ($_FILES['kyc_identity_front']['name'] != '' && $_FILES['kyc_identity_back']['name'] != '' && $_FILES['kyc_user_image']['name'] != '') {

      $kyc_identity_front_file_name = '';
      $kyc_identity_back_file_name = '';
      $kyc_user_image_file_name = '';




      $kyc_identity_front_file_name_new = $_FILES['kyc_identity_front']['name']; // Get the Uploaded file Name.
      $kyc_identity_back_file_name_new = $_FILES['kyc_identity_back']['name']; // Get the Uploaded file Name.
      $kyc_user_image_file_name_new = $_FILES['kyc_user_image']['name']; // Get the Uploaded file Name.


      $kyc_identity_front_extension = pathinfo($kyc_identity_front_file_name_new, PATHINFO_EXTENSION); //Get the Extension of uploded file
      $kyc_identity_back_extension = pathinfo($kyc_identity_back_file_name_new, PATHINFO_EXTENSION); //Get the Extension of uploded file
      $kyc_user_image_extension = pathinfo($kyc_user_image_file_name_new, PATHINFO_EXTENSION); //Get the Extension of uploded file

      $valid_extensions = array("png", "jpg", "jpeg", "gif", "pdf","JPEG", "GIF", "PNG", "SWF", "TIFF","XBM","XPM","WBMP","WebP","BMP"); //Extensions that are allowed.

      if (in_array($kyc_identity_front_extension, $valid_extensions) && in_array($kyc_identity_back_extension, $valid_extensions) &&  in_array($kyc_user_image_extension, $valid_extensions)) { // check if upload file is a valid image file.
         $timestamp = time();

         $new_name_one = $user_id . "kyc_id_front" . $timestamp . "akc" . rand() . "." . $kyc_identity_front_extension;
         $new_name_two = $user_id . "kyc_id_back" . $timestamp . "akc" . rand() . "." . $kyc_identity_back_extension;
         $new_name_three = $user_id . "kyc_img" . $timestamp . "akc" . rand() . "." . $kyc_user_image_extension;

         $path_one = "../uploads/users/kyc/" . $new_name_one;
         $path_two = "../uploads/users/kyc/" . $new_name_two;
         $path_three = "../uploads/users/kyc/" . $new_name_three;


         if (move_uploaded_file($_FILES['kyc_identity_front']['tmp_name'], $path_one)) {
            $upload_kyc_document_variable = 1;
         }
         if (move_uploaded_file($_FILES['kyc_identity_back']['tmp_name'], $path_two)) {
            $upload_kyc_document_variable = 1;
         }
         if (move_uploaded_file($_FILES['kyc_user_image']['tmp_name'], $path_three)) {
            $upload_kyc_document_variable = 1;
         }

         $kyc_identity_front_file_name =  $new_name_one;
         $kyc_identity_back_file_name =  $new_name_two;
         $kyc_user_image_file_name = $new_name_three;
      }




      if ($upload_kyc_document_variable == 1) {

         $query4 = "UPDATE `users` SET `kyc_country`='$kyc_country',`kyc_first_name`='$kyc_first_name',`kyc_last_name`='$kyc_last_name',`kyc_dob`='$kyc_dob',`kyc_identity_front`='$kyc_identity_front_file_name',`kyc_identity_back`='$kyc_identity_back_file_name',`kyc_user_image`=' $kyc_user_image_file_name',`kyc_approved` = 2 WHERE `id` = $user_id";
         if ($con->query($query4) === TRUE) {
            // header('location:../kyc/document-submitted.p
         } else {
            // echo "Error: " . $query4 . "<br>" . $con->error;



            $user_email = $user_data['email'];
            // mail logic


            // Multiple recipients
            $to = $user_email; // note the comma
            // Subject
            $subject = 'KYC Submitted Successfully [Tesla Inu]';

            // Message
            $message = '<!DOCTYPE html>
            <html lang="en">
              <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta
                  name="description"
                  content="Xolo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."
                />
                <meta
                  name="keywords"
                  content="admin template, Xolo admin template, dashboard template, flat admin template, responsive admin template, web app"
                />
                <meta name="author" content="pixelstrap" />
                <link
                  rel="icon"
                  href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
                  type="image/x-icon"
                />
                <link
                  rel="shortcut icon"
                  href="http://laravel.pixelstrap.com/xolo/assets/images/favicon.png"
                  type="image/x-icon"
                />
                <title>THS Mining</title>
                <link
                  href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
                  rel="stylesheet"
                />
                <link
                  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                  rel="stylesheet"
                />
                <link
                  href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                  rel="stylesheet"
                />
                <style type="text/css">
                  body {
                    width: 650px;
                    font-family: work-Sans, sans-serif;
                    background-color: #f6f7fb;
                    display: block;
                  }
                  a {
                    text-decoration: none;
                  }
                  span {
                    font-size: 14px;
                  }
                  p {
                    font-size: 13px;
                    line-height: 1.7;
                    letter-spacing: 0.7px;
                    margin-top: 0;
                  }
                  .text-center {
                    text-align: center;
                  }
                </style>
              </head>
              <body style="margin: 30px auto">
                <table style="width: 100%">
                  <tbody>
                    <tr>
                      <td>
                        <table style="background-color: #f6f7fb; width: 100%">
                          <tbody>
                            <tr>
                              <td>
                                <table
                                  style="width: 650px; margin: 0 auto; margin-bottom: 30px; margin-top:30px;"
                                >
                                  <tbody>
                                    <tr>
                                      <td>
                                        <img
                                          src="http://teslainu.com/portal/assets/images/logo/logo.png"
                                          alt=""
                                        />
                                      </td>
                                      <td style="text-align: right; color: #999">
                                        
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table
                                  style="
                                    width: 650px;
                                    margin: 0 auto;
                                    background-color: #fff;
                                    border-radius: 8px;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td style="padding: 30px">
                                        <p>Hi There,</p>
                                        <p>
                                            Thank you for submitting KYC documents to Tesla INU. 
                                          </p>
                                          <p>
                                          We are working hard to verify users KYC withing 48 hours. we appreciate your patience.
                                          </p>
                                       
                                        <p>
                                         Once verified, Your will be able to withdraw more than 1M TSIT Token .
                                        </p>
                                        <p style="margin-bottom: 0">
                                          Good luck! Hope it works.
                                        </p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table
                                  style="width: 650px; margin: 0 auto; margin-top: 30px"
                                >
                                  <tbody>
                                    <tr style="text-align: center">
                                      <td>
                                        <p style="color: #999; margin-bottom: 0">
                                          
                                        </p>
                                        <p style="color: #999; margin-bottom: 0">
                                          Dont Like These Emails?<a
                                            href="#"
                                            style="color: #3452ff"
                                            > Unsubscribe</a
                                          >
                                        </p>
                                        
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </body>
            </html>
            ';

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

            // Additional headers
            $headers[] = 'From: Tesla INU Official <no-reply@teslainu.com>';

            // Mail it
            $mailto = mail($to, $subject, $message, implode("\r\n", $headers));

            if ($mailto) {

               echo "<script>var email_resend_alert = 1;</script>";
               //      echo "mail sent";

            }

            // mail logic ends
         }
      } else {
?>
         <script>
            alert("Error in image upload!");
         </script>
      <?php
      }
      ?>

      <script>
         window.location = '../kyc/document-submitting-file-upload.php';
      </script>
<?php
   } else {
      echo "false";
   }
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
   <title>KYC - Tesla INU Web Portal</title>
   <!-- FAVICONS ICON -->
   <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
   <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
   <link rel="stylesheet" href="../assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
   <!-- Style css -->
   <link href="../assets/css/style.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
   <!--*******************
         Preloader start
         ********************-->
   <div id="preloader">
      <div class="lds-ripple">
         <div></div>
         <div></div>
      </div>
   </div>
   <!--*******************
         Preloader end
         ********************-->
   <!--**********************************
         Main wrapper start
         ***********************************-->
   <div id="main-wrapper">
      <?php require('../elements/header.php'); ?>
      <?php require('../elements/sidebar.php'); ?>
      <div class="content-body">
         <!--**********************************
               Content body start
               ***********************************-->
         <!-- row -->
         <div class="container mt-5">
            <div class="row">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Upload Document</h3>
                  </div>
                  <div class="card-body">
                     <div class="form">
                        <form id="submit_form" action="" method="post" enctype="multipart/form-data" onsubmit="return submitDoc()">
                           <div class="row mt-3">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for=""> First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control wide" name="kyc_first_name" placeholder="Enter your first name" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for=""> Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control wide" name="kyc_last_name" placeholder="Enter your last name" required>
                                 </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                 <div class="form-group">
                                    <label for=""> Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control wide" name="kyc_dob" placeholder="Enter your date of birth" required>
                                 </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                 <div class="form-group">
                                    <label for=""> Country<span class="text-danger">*</span></label>
                                    <select class="form-control wide" name="kyc_country" required>
                                       <option value="Afganistan">Afghanistan</option>
                                       <option value="Albania">Albania</option>
                                       <option value="Algeria">Algeria</option>
                                       <option value="American Samoa">American Samoa</option>
                                       <option value="Andorra">Andorra</option>
                                       <option value="Angola">Angola</option>
                                       <option value="Anguilla">Anguilla</option>
                                       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                       <option value="Argentina">Argentina</option>
                                       <option value="Armenia">Armenia</option>
                                       <option value="Aruba">Aruba</option>
                                       <option value="Australia">Australia</option>
                                       <option value="Austria">Austria</option>
                                       <option value="Azerbaijan">Azerbaijan</option>
                                       <option value="Bahamas">Bahamas</option>
                                       <option value="Bahrain">Bahrain</option>
                                       <option value="Bangladesh">Bangladesh</option>
                                       <option value="Barbados">Barbados</option>
                                       <option value="Belarus">Belarus</option>
                                       <option value="Belgium">Belgium</option>
                                       <option value="Belize">Belize</option>
                                       <option value="Benin">Benin</option>
                                       <option value="Bermuda">Bermuda</option>
                                       <option value="Bhutan">Bhutan</option>
                                       <option value="Bolivia">Bolivia</option>
                                       <option value="Bonaire">Bonaire</option>
                                       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                       <option value="Botswana">Botswana</option>
                                       <option value="Brazil">Brazil</option>
                                       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                       <option value="Brunei">Brunei</option>
                                       <option value="Bulgaria">Bulgaria</option>
                                       <option value="Burkina Faso">Burkina Faso</option>
                                       <option value="Burundi">Burundi</option>
                                       <option value="Cambodia">Cambodia</option>
                                       <option value="Cameroon">Cameroon</option>
                                       <option value="Canada">Canada</option>
                                       <option value="Canary Islands">Canary Islands</option>
                                       <option value="Cape Verde">Cape Verde</option>
                                       <option value="Cayman Islands">Cayman Islands</option>
                                       <option value="Central African Republic">Central African Republic</option>
                                       <option value="Chad">Chad</option>
                                       <option value="Channel Islands">Channel Islands</option>
                                       <option value="Chile">Chile</option>
                                       <option value="China">China</option>
                                       <option value="Christmas Island">Christmas Island</option>
                                       <option value="Cocos Island">Cocos Island</option>
                                       <option value="Colombia">Colombia</option>
                                       <option value="Comoros">Comoros</option>
                                       <option value="Congo">Congo</option>
                                       <option value="Cook Islands">Cook Islands</option>
                                       <option value="Costa Rica">Costa Rica</option>
                                       <option value="Cote DIvoire">Cote DIvoire</option>
                                       <option value="Croatia">Croatia</option>
                                       <option value="Cuba">Cuba</option>
                                       <option value="Curaco">Curacao</option>
                                       <option value="Cyprus">Cyprus</option>
                                       <option value="Czech Republic">Czech Republic</option>
                                       <option value="Denmark">Denmark</option>
                                       <option value="Djibouti">Djibouti</option>
                                       <option value="Dominica">Dominica</option>
                                       <option value="Dominican Republic">Dominican Republic</option>
                                       <option value="East Timor">East Timor</option>
                                       <option value="Ecuador">Ecuador</option>
                                       <option value="Egypt">Egypt</option>
                                       <option value="El Salvador">El Salvador</option>
                                       <option value="Equatorial Guinea">Equatorial Guinea</option>
                                       <option value="Eritrea">Eritrea</option>
                                       <option value="Estonia">Estonia</option>
                                       <option value="Ethiopia">Ethiopia</option>
                                       <option value="Falkland Islands">Falkland Islands</option>
                                       <option value="Faroe Islands">Faroe Islands</option>
                                       <option value="Fiji">Fiji</option>
                                       <option value="Finland">Finland</option>
                                       <option value="France">France</option>
                                       <option value="French Guiana">French Guiana</option>
                                       <option value="French Polynesia">French Polynesia</option>
                                       <option value="French Southern Ter">French Southern Ter</option>
                                       <option value="Gabon">Gabon</option>
                                       <option value="Gambia">Gambia</option>
                                       <option value="Georgia">Georgia</option>
                                       <option value="Germany">Germany</option>
                                       <option value="Ghana">Ghana</option>
                                       <option value="Gibraltar">Gibraltar</option>
                                       <option value="Great Britain">Great Britain</option>
                                       <option value="Greece">Greece</option>
                                       <option value="Greenland">Greenland</option>
                                       <option value="Grenada">Grenada</option>
                                       <option value="Guadeloupe">Guadeloupe</option>
                                       <option value="Guam">Guam</option>
                                       <option value="Guatemala">Guatemala</option>
                                       <option value="Guinea">Guinea</option>
                                       <option value="Guyana">Guyana</option>
                                       <option value="Haiti">Haiti</option>
                                       <option value="Hawaii">Hawaii</option>
                                       <option value="Honduras">Honduras</option>
                                       <option value="Hong Kong">Hong Kong</option>
                                       <option value="Hungary">Hungary</option>
                                       <option value="Iceland">Iceland</option>
                                       <option value="Indonesia">Indonesia</option>
                                       <option value="India">India</option>
                                       <option value="Iran">Iran</option>
                                       <option value="Iraq">Iraq</option>
                                       <option value="Ireland">Ireland</option>
                                       <option value="Isle of Man">Isle of Man</option>
                                       <option value="Israel">Israel</option>
                                       <option value="Italy">Italy</option>
                                       <option value="Jamaica">Jamaica</option>
                                       <option value="Japan">Japan</option>
                                       <option value="Jordan">Jordan</option>
                                       <option value="Kazakhstan">Kazakhstan</option>
                                       <option value="Kenya">Kenya</option>
                                       <option value="Kiribati">Kiribati</option>
                                       <option value="Korea North">Korea North</option>
                                       <option value="Korea Sout">Korea South</option>
                                       <option value="Kuwait">Kuwait</option>
                                       <option value="Kyrgyzstan">Kyrgyzstan</option>
                                       <option value="Laos">Laos</option>
                                       <option value="Latvia">Latvia</option>
                                       <option value="Lebanon">Lebanon</option>
                                       <option value="Lesotho">Lesotho</option>
                                       <option value="Liberia">Liberia</option>
                                       <option value="Libya">Libya</option>
                                       <option value="Liechtenstein">Liechtenstein</option>
                                       <option value="Lithuania">Lithuania</option>
                                       <option value="Luxembourg">Luxembourg</option>
                                       <option value="Macau">Macau</option>
                                       <option value="Macedonia">Macedonia</option>
                                       <option value="Madagascar">Madagascar</option>
                                       <option value="Malaysia">Malaysia</option>
                                       <option value="Malawi">Malawi</option>
                                       <option value="Maldives">Maldives</option>
                                       <option value="Mali">Mali</option>
                                       <option value="Malta">Malta</option>
                                       <option value="Marshall Islands">Marshall Islands</option>
                                       <option value="Martinique">Martinique</option>
                                       <option value="Mauritania">Mauritania</option>
                                       <option value="Mauritius">Mauritius</option>
                                       <option value="Mayotte">Mayotte</option>
                                       <option value="Mexico">Mexico</option>
                                       <option value="Midway Islands">Midway Islands</option>
                                       <option value="Moldova">Moldova</option>
                                       <option value="Monaco">Monaco</option>
                                       <option value="Mongolia">Mongolia</option>
                                       <option value="Montserrat">Montserrat</option>
                                       <option value="Morocco">Morocco</option>
                                       <option value="Mozambique">Mozambique</option>
                                       <option value="Myanmar">Myanmar</option>
                                       <option value="Nambia">Nambia</option>
                                       <option value="Nauru">Nauru</option>
                                       <option value="Nepal">Nepal</option>
                                       <option value="Netherland Antilles">Netherland Antilles</option>
                                       <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                       <option value="Nevis">Nevis</option>
                                       <option value="New Caledonia">New Caledonia</option>
                                       <option value="New Zealand">New Zealand</option>
                                       <option value="Nicaragua">Nicaragua</option>
                                       <option value="Niger">Niger</option>
                                       <option value="Nigeria">Nigeria</option>
                                       <option value="Niue">Niue</option>
                                       <option value="Norfolk Island">Norfolk Island</option>
                                       <option value="Norway">Norway</option>
                                       <option value="Oman">Oman</option>
                                       <option value="Pakistan">Pakistan</option>
                                       <option value="Palau Island">Palau Island</option>
                                       <option value="Palestine">Palestine</option>
                                       <option value="Panama">Panama</option>
                                       <option value="Papua New Guinea">Papua New Guinea</option>
                                       <option value="Paraguay">Paraguay</option>
                                       <option value="Peru">Peru</option>
                                       <option value="Phillipines">Philippines</option>
                                       <option value="Pitcairn Island">Pitcairn Island</option>
                                       <option value="Poland">Poland</option>
                                       <option value="Portugal">Portugal</option>
                                       <option value="Puerto Rico">Puerto Rico</option>
                                       <option value="Qatar">Qatar</option>
                                       <option value="Republic of Montenegro">Republic of Montenegro</option>
                                       <option value="Republic of Serbia">Republic of Serbia</option>
                                       <option value="Reunion">Reunion</option>
                                       <option value="Romania">Romania</option>
                                       <option value="Russia">Russia</option>
                                       <option value="Rwanda">Rwanda</option>
                                       <option value="St Barthelemy">St Barthelemy</option>
                                       <option value="St Eustatius">St Eustatius</option>
                                       <option value="St Helena">St Helena</option>
                                       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                       <option value="St Lucia">St Lucia</option>
                                       <option value="St Maarten">St Maarten</option>
                                       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                       <option value="Saipan">Saipan</option>
                                       <option value="Samoa">Samoa</option>
                                       <option value="Samoa American">Samoa American</option>
                                       <option value="San Marino">San Marino</option>
                                       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                       <option value="Saudi Arabia">Saudi Arabia</option>
                                       <option value="Senegal">Senegal</option>
                                       <option value="Seychelles">Seychelles</option>
                                       <option value="Sierra Leone">Sierra Leone</option>
                                       <option value="Singapore">Singapore</option>
                                       <option value="Slovakia">Slovakia</option>
                                       <option value="Slovenia">Slovenia</option>
                                       <option value="Solomon Islands">Solomon Islands</option>
                                       <option value="Somalia">Somalia</option>
                                       <option value="South Africa">South Africa</option>
                                       <option value="Spain">Spain</option>
                                       <option value="Sri Lanka">Sri Lanka</option>
                                       <option value="Sudan">Sudan</option>
                                       <option value="Suriname">Suriname</option>
                                       <option value="Swaziland">Swaziland</option>
                                       <option value="Sweden">Sweden</option>
                                       <option value="Switzerland">Switzerland</option>
                                       <option value="Syria">Syria</option>
                                       <option value="Tahiti">Tahiti</option>
                                       <option value="Taiwan">Taiwan</option>
                                       <option value="Tajikistan">Tajikistan</option>
                                       <option value="Tanzania">Tanzania</option>
                                       <option value="Thailand">Thailand</option>
                                       <option value="Togo">Togo</option>
                                       <option value="Tokelau">Tokelau</option>
                                       <option value="Tonga">Tonga</option>
                                       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                       <option value="Tunisia">Tunisia</option>
                                       <option value="Turkey">Turkey</option>
                                       <option value="Turkmenistan">Turkmenistan</option>
                                       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                       <option value="Tuvalu">Tuvalu</option>
                                       <option value="Uganda">Uganda</option>
                                       <option value="United Kingdom">United Kingdom</option>
                                       <option value="Ukraine">Ukraine</option>
                                       <option value="United Arab Erimates">United Arab Emirates</option>
                                       <option value="United States of America">United States of America</option>
                                       <option value="Uraguay">Uruguay</option>
                                       <option value="Uzbekistan">Uzbekistan</option>
                                       <option value="Vanuatu">Vanuatu</option>
                                       <option value="Vatican City State">Vatican City State</option>
                                       <option value="Venezuela">Venezuela</option>
                                       <option value="Vietnam">Vietnam</option>
                                       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                       <option value="Wake Island">Wake Island</option>
                                       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                       <option value="Yemen">Yemen</option>
                                       <option value="Zaire">Zaire</option>
                                       <option value="Zambia">Zambia</option>
                                       <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6"></div>
                           </div>
                           <div class="row mt-5">
                              <h5>Identity Proof</h5>
                              <div class="col-md-6 pt-4">
                                 <div class="form-group">
                                    <label for="">Front page <span class="text-danger">*</span></label>
                                    <div class="form-file">
                                       <input type="file" class="form-file-input form-control" name="kyc_identity_front" required />
                                    </div>
                                    <div class="text-muted">
                                       Valid identity proofs are Passport, Government Issued Id Card and Driving License.
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 pt-4">
                                 <div class="form-group">
                                    <label for="">Back page</label>
                                    <div class="form-file">
                                       <input type="file" class="form-file-input form-control" name="kyc_identity_back" />
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-5">
                              <h5>User Image</h5>
                              <div class="col-md-6 pt-4">
                                 <div class="form-group">
                                    <label for="">User Image<span class="text-danger">*</span></label>
                                    <div class="form-file">
                                       <input type="file" class="form-file-input form-control" name="kyc_user_image" required />
                                    </div>
                                    <div class="text-muted">Upload selfie image with holding white paper TSIT written on it. <br>
                                       Check <a href="../assets/images/kyc/kyc-example-1.jpg" target="_blank"> example image 1</a> and <a href="../assets/images/kyc/kyc-example-2.jpg" target="_blank"> example image 2</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="row">
                                    <div class="col-12">
                                       <h5>Example Image</h5>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <img src="../assets/images/kyc/male.jpg" class="img-fluid" alt="">
                                    </div>
                                    <!-- <div class="col-md-6">
                                    <img src="../assets/images/kyc/female.jpg" class="img-fluid" alt="">
                                 </div> -->
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-5">
                              <div class="col-md-12">
                                 <br />
                                 <br />
                                 <div class="form-group" style="float: right !important;">
                                    <button class="btn btn-primary float-right" name="update_kyc">Submit</button>
                                 </div>
                              </div>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--**********************************
               Content body end
               ***********************************-->
      <?php require('../elements/footer.php'); ?>
      <!--**********************************
               Support ticket button start
               ***********************************-->
      <!--**********************************
               Support ticket button end
               ***********************************-->
   </div>
   </div>
   <!--**********************************
         Main wrapper end
         ***********************************-->
   <!--**********************************
         Scripts
         ***********************************-->
   <!-- Required vendors -->
   <script src="../assets/vendor/global/global.min.js"></script>
   <script src="../assets/vendor/chart.js/Chart.bundle.min.js"></script>
   <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
   <!-- Apex Chart -->
   <script src="../assets/vendor/apexchart/apexchart.js"></script>
   <!-- Chart piety plugin files -->
   <script src="../assets/vendor/peity/jquery.peity.min.js"></script>
   <!-- Dashboard 1 -->
   <!-- <script src="../assets/js/dashboard/dashboard-1.js"></script> -->
   <!-- JS for dotted map -->
   <script src="../assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
   <script src="../assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
   <script src="../assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
   <script src="../assets/vendor/dotted-map/js/world.js"></script>
   <script src="../assets/vendor/dotted-map/js/smallimap.js"></script>
   <script src="../assets/js/dashboard/dotted-map-init.js"></script>
   <script src="../assets/js/custom.min.js"></script>
   <script src="../assets/js/deznav-init.js"></script>
   <script src="../assets/js/demo.js"></script>
   <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
         var fileName = $(this).val().split("\\").pop();
         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
   </script>

   <script>
      function submitDoc() {




         var elem = document.getElementById("myBar");
         var width = 20;
         //gerate random number form 10 to 100
         var random = Math.floor(Math.random() * (100 - 10 + 1)) + 10;
         var id = setInterval(frame, random);

         function frame() {
            if (width >= 100) {
               clearInterval(id);
            } else {
               width++;
               elem.style.width = width + '%';
               document.getElementById("demo").innerHTML = width * 1 + '%';
            }
         }
      }
   </script>
</body>

</html>