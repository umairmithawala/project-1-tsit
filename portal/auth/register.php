<?php
session_start();
require_once '../database/db-con.php';
require '../../vendor/autoload.php';

   use IEXBase\TronAPI\Tron;
?>
<?php
//get the ref variable with GET method if isset else set it to empty
$ref = isset($_GET['ref']) ? $_GET['ref'] : '';

?>
<?php
$alert_msg = 0;
if (isset($_POST['register'])) {

  $name = $_POST['name'];
  // $name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
  $email = $_POST['email'];
  // $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
  $password = $_POST['password'];
  // $password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");
  $referral_code = $_POST['referral_code'];
  // $referral_code = htmlspecialchars($referral_code, ENT_QUOTES, "UTF-8");
  $role = 2;


  // captcha verificaiton
  if (isset($_POST['g-recaptcha-response'])) {

    $captcha = $_POST['g-recaptcha-response'];

    $secretKey = "6LdALPEcAAAAAIqxptUnczW2uMKFzKBSaIAdP-OP";
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);
    // should return JSON with success as true
    if ($responseKeys["success"]) {


      $query = "SELECT * FROM `users` WHERE `email` = '$email'";
      $run_fetch = mysqli_query($con, $query);
      $noofrow = mysqli_num_rows($run_fetch);

      if ($noofrow == 0) {

        $date = date_create();
        $timestamp = date_timestamp_get($date);
        $referred_by_id = 0;
        //get the id from referral code from user table
        $query_referral = "SELECT * FROM `users` WHERE `my_referral_code` = '$referral_code'";
        $run_fetch_referral = mysqli_query($con, $query_referral);
        $noofrow_referral = mysqli_num_rows($run_fetch_referral);
        if ($noofrow_referral == 1) {
          $row_referral = mysqli_fetch_array($run_fetch_referral);
          $referred_by_id = $row_referral['id'];
        } else {
          $referred_by_id = 0;
        }
        //generate 4 char long referral code
        $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 4);

        //check in users table if this referral code exist or not
        $query = "SELECT * FROM `users` WHERE `my_referral_code` = '$my_referral_code'";
        $run_fetch = mysqli_query($con, $query);
        $noofrow = mysqli_num_rows($run_fetch);

        if ($noofrow == 0) {
          $my_referral_code = $my_referral_code;
        } else {
          $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 4);
          //check in users table if this referral code exist or not
          $query = "SELECT * FROM `users` WHERE `my_referral_code` = '$my_referral_code'";
          $run_fetch = mysqli_query($con, $query);
          $noofrow = mysqli_num_rows($run_fetch);
          if ($noofrow == 0) {
            $my_referral_code = $my_referral_code;
          } else {
            $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 4);
            //check in users table if this referral code exist or not
            $query = "SELECT * FROM `users` WHERE `my_referral_code` = '$my_referral_code'";
            $run_fetch = mysqli_query($con, $query);
            $noofrow = mysqli_num_rows($run_fetch);
            if ($noofrow == 0) {
              $my_referral_code = $my_referral_code;
            } else {
              $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 4);
              //check in users table if this referral code exist or not
              $query = "SELECT * FROM `users` WHERE `my_referral_code` = '$my_referral_code'";
              $run_fetch = mysqli_query($con, $query);
              $noofrow = mysqli_num_rows($run_fetch);
              if ($noofrow == 0) {
                $my_referral_code = $my_referral_code;
              } else {
                $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 4);
                //check in users table if this referral code exist or not
                $query = "SELECT * FROM `users` WHERE `my_referral_code` = '$my_referral_code'";
                $run_fetch = mysqli_query($con, $query);
                $noofrow = mysqli_num_rows($run_fetch);
                if ($noofrow == 0) {
                  $my_referral_code = $my_referral_code;
                } else {
                  $my_referral_code = substr(md5(uniqid(rand(), true)), 0, 10);
                }
              }
            }
          }
        }


        if ($referred_by_id != 0) {
          $query2 = "INSERT INTO `users`(`id`,`user_role`, `name`, `email`, `password`, `user_img`, `my_referral_code`,`referred_by_id`,`timestamp`,`kyc_approved`) VALUES (NULL,$role,'$name','$email','$password','user.png','$my_referral_code','$referred_by_id', $timestamp,0)";
          if ($con->query($query2) === true) {

            // print_r($query2);
            $user_id =  mysqli_insert_id($con);
            $_SESSION['user_session_var'] = $user_id;

            //creating wallet address 


            $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

            try {
              $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);

              $generateAddress = $tron->generateAddress(); // or createAddress()
              $isValid = $tron->isAddress($generateAddress->getAddress());


              // echo '<br>Address hex: '. $generateAddress->getAddress();
              // echo '<br>Address base58: '. $generateAddress->getAddress(true);
              // echo '<br>Private key: '. $generateAddress->getPrivateKey();
              // echo '<br>Public key: '. $generateAddress->getPublicKey();
              // echo '<br>Is Validate: '. $isValid;

              // print_r('Raw data: '.$generateAddress->getRawData());

            } catch (\IEXBase\TronAPI\Exception\TronException $e) {
              // echo $e->getMessage();
            }



            $wallet_address =  $generateAddress->getAddress(true);
            $wallet_hex_address =  $generateAddress->getAddress();
            $wallet_private_key =  $generateAddress->getPrivateKey();
            $wallet_public_key =  $generateAddress->getPublicKey();

            // $query3 = "INSERT INTO `wallets`(`id`, `user_id`, `wallet_address_one`, 
            // `wallet_address_one_currency`, `wallet_address_one_blockchain`, `timestamp`) VALUES (NULL
            // ,$user_id,'$wallet_address','TSIT','TRON',$timestamp)";



            $query3 = "INSERT INTO `wallets`(`id`, `user_id`, `wallet_address_one`, `wallet_private_key_one`, 
`wallet_hex_address_one`, `wallet_public_key_one`, `wallet_address_one_currency`, `wallet_address_one_blockchain`, 
`timestamp`) VALUES (NULL,$user_id,'$wallet_address','$wallet_private_key','$wallet_hex_address','$wallet_public_key','TSIT','TRON',$timestamp)";



            if ($con->query($query3) === true) {
            } else {
              // echo "Error: " . $query3 . "<br>" . $con->error;

            }

            // INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

            //insert this user signup news into dashboard_news table
            $query4 = "INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES (NULL,'$name has joined the community','$user_id','0',$timestamp)";
            if ($con->query($query4) === true) {
              // echo "New record created successfully";
            } else {
              // echo "Error: " . $query4 . "<br>" . $con->error;
            }



            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 3; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            // sending verification mail
            $verification_link = 'http://teslainu.com/portal/utility/verify-my-email.php?ch=';
            for ($i = 0; $i < 5; $i++) {
              $verification_link .= $characters[rand(0, $charactersLength - 1)];
            }
            $verification_link .= $user_id;
            for ($i = 0; $i < 8; $i++) {
              $verification_link .= $characters[rand(0, $charactersLength - 1)];
            }




            // Multiple recipients
            $to = $email; // note the comma
            // Subject
            $subject = 'Welcome To Tesla INU';

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
                                    Thank you for Joining Tesla INU. 
                                  </p>
                                  <p>
                                    Please confirm your email address by clicking on the button below or use this link ' . $verification_link . ' withing 48 hours. 
                                  </p>
                                <a
                                  href="' . $verification_link . '"
                                  style="
                                    padding: 10px;
                                    background-color: #3452ff;
                                    color: #fff;
                                    display: inline-block;
                                    border-radius: 4px;
                                    margin-bottom: 18px;
                                  "
                                  >Verify Email
                                </a>
                                <p>
                                 Once confirmed, this email will be uniquely associated with your Tesla INU account.
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
            mail($to, $subject, $message, implode("\r\n", $headers));

            // mail logic ends




?>
            <script>
              window.location = "../dashboard/";
            </script>
<?php
          } else {
            // echo "Error: " . $query2 . "<br>" . $con->error;
          }
        } else {
          $alert_msg = "Please enter valid referral code!";
        }
      } else {
        $alert_msg = "Email already exist";
      }
    } else {
      $alert_msg = "Captcha verification failed!";
    }
  }
  if (!$captcha) {
    $alert_msg = "Captcha code missing";
    // echo "<script>alert('Captcha code missing!');</script>";

  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Register - TSIT - World's No 1 Scam Database</title>
  <link rel="icon" type="image/png" href="../../en/assets/img/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../../en/assets/css/plugins.css" />
  <link rel="stylesheet" type="text/css" href="../../en/assets/css/theme-styles.css" />
  <link rel="stylesheet" type="text/css" href="../../en/assets/css/blocks.css" />
  <link rel="stylesheet" type="text/css" href="../../en/assets/css/widgets.css" />
  <link rel="stylesheet" type="text/css" href="../../en/assets/css/font-awesome.css" />
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet" />
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  <style>
    .alerttoggle {
      display: none;
    }
  </style>
</head>

<body class="crumina-grid">
  <?php
  require_once('../elements/landing-header.php');
  ?>
  <div class="main-content-wrapper medium-padding120">
    <section>
      <div class="container">
        <div class="row pt50">
          <div class="col-lg-3"></div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb30">
            <form class="login-form form--dark" method="post" action="#">
              <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                <h2 class="heading-title">Register</h2>
                <p>* All fields are required</p>
              </header>
              <div class="alert alert--with-bg alert-danger alerttoggle" role="alert" id="alert_one">
                <div class="alert-icon">
                  <svg class="woox-icon icon-del">
                    <use xlink:href="#icon-close-cross"></use>
                  </svg>
                </div>
                <strong></strong> <span id="alert_msg_id"></span>
                <a href="#" class="icon-close">
                  <svg class="woox-icon icon-del">
                    <use xlink:href="#icon-close-cross"></use>
                  </svg>
                </a>
              </div>
              <label for="name4" class="input-label">Name <abbr class="required" title="required">*</abbr></label>
              <div class="input-with-icon input-icon--right">
                <input class="input--dark input--squared" id="name4" name="name" placeholder="Enter your full name" type="text" required />
                <svg class="woox-icon icon-black-male-user-symbol-2">
                  <use xlink:href="#icon-black-male-user-symbol-2"></use>
                </svg>
              </div>
              <label for="name3" class="input-label">Username or Email <abbr class="required" title="required">*</abbr></label>
              <div class="input-with-icon input-icon--right">
                <input class="input--dark input--squared" id="name3" name="email" placeholder="Username or Email" type="email" required />
                <svg class="woox-icon icon-black-male-user-symbol-2">
                  <use xlink:href="#icon-black-male-user-symbol-2"></use>
                </svg>
              </div>
              <label for="password3" class="input-label">Password <abbr class="required" title="required">*</abbr></label>
              <div class="input-with-icon input-icon--right">
                <input class="input--dark input--squared" id="password3" name="password" placeholder="•••••••••••" type="password" required />
                <svg class="woox-icon icon-padlock">
                  <use xlink:href="#icon-padlock"></use>
                </svg>
              </div><label for="referral_code" class="input-label">Referral Code <abbr class="required" title="required">*</abbr></label>
              <div class="input-with-icon input-icon--right">
                <input value="<?php echo $ref; ?>" class="input--dark input--squared" id="referral_code" name="referral_code" placeholder="Enter Referral Code" type="text" required />

              </div>
              <br><br>


              <div class="g-recaptcha" data-sitekey="6LdALPEcAAAAAFGMMUWzfw0XrtGcKwB76nKnOwnF" data-type="image"></div>
              <div class="checkbox checkbox--style3 clicked">
                <label>
                  <input type="checkbox" name="optionsCheckboxes10" checked="" />
                  I agree with the all additional
                  <a class="link-underlined" href="#">Terms and Conditions</a>
                </label>
              </div>
              <button class="btn btn--large btn--primary btn--with-icon btn--icon-right full-width" type="submit" name="register">
                Register NOW
                <svg class="woox-icon icon-arrow-right">
                  <use xlink:href="#icon-arrow-right"></use>
                </svg>
              </button>
              <br />
              <br />
              <a href="../auth/login.php">
                <div class="btn btn--large btn--green-light btn--transparent btn--with-icon btn--icon-right full-width">
                  Login Instead
                  <svg class="woox-icon icon-arrow-right">
                    <use xlink:href="#icon-arrow-right"></use>
                  </svg>
                </div>
              </a>
            </form>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </section>
  </div>
  <?php
  require_once('../elements/landing-footer.php');
  ?>
  <script src="../../en/assets/js/method-assign.js"></script>
  <script src="../../en/assets/js/jquery-3.3.1.js"></script>
  <script src="../../en/assets/js/js-plugins/leaflet.js"></script>
  <script src="../../en/assets/js/js-plugins/MarkerClusterGroup.js"></script>
  <script src="../../en/assets/js/js-plugins/crum-mega-menu.js"></script>
  <script src="../../en/assets/js/js-plugins/waypoints.js"></script>
  <script src="../../en/assets/js/js-plugins/jquery-circle-progress.js"></script>
  <script src="../../en/assets/js/js-plugins/segment.js"></script>
  <script src="../../en/assets/js/js-plugins/bootstrap.js"></script>
  <script src="../../en/assets/js/js-plugins/imagesLoaded.js"></script>
  <script src="../../en/assets/js/js-plugins/jquery.matchHeight.js"></script>
  <script src="../../en/assets/js/js-plugins/jquery-countTo.js"></script>
  <script src="../../en/assets/js/js-plugins/Headroom.js"></script>
  <script src="../../en/assets/js/js-plugins/jquery.magnific-popup.js"></script>
  <script src="../../en/assets/js/js-plugins/popper.min.js"></script>
  <script src="../../en/assets/js/js-plugins/particles.js"></script>
  <script src="../../en/assets/js/js-plugins/perfect-scrollbar.js"></script>
  <script src="../../en/assets/js/js-plugins/jquery.datetimepicker.full.js"></script>
  <script src="../../en/assets/js/js-plugins/svgxuse.js"></script>
  <script src="../../en/assets/js/js-plugins/select2.js"></script>
  <script src="../../en/assets/js/js-plugins/smooth-scroll.js"></script>
  <script src="../../en/assets/js/js-plugins/sharer.js"></script>
  <script src="../../en/assets/js/js-plugins/isotope.pkgd.min.js"></script>
  <script src="../../en/assets/js/js-plugins/ajax-pagination.js"></script>
  <script src="../../en/assets/js/js-plugins/swiper.min.js"></script>
  <script src="../../en/assets/js/js-plugins/material.min.js"></script>
  <script src="../../en/assets/js/js-plugins/orbitlist.js"></script>
  <script src="../../en/assets/js/js-plugins/highstock.js"></script>
  <script src="../../en/assets/js/js-plugins/bootstrap-datepicker.js"></script>
  <script src="../../en/assets/js/js-plugins/TimeCircles.js"></script>
  <script src="../../en/assets/js/js-plugins/ion.rangeSlider.js"></script>
  <script defer src="../../en/assets/fonts/fontawesome-all.js"></script>
  <script src="../../en/assets/js/main.js"></script>
  <script src="../../en/assets/js/svg-loader.js"></script>
</body>

</html>

<script>
  var alert_msg = "<?php echo $alert_msg; ?>";
  console.log(alert_msg);
  if (alert_msg != 0) {
    document.getElementById("alert_one").style.display = "-webkit-box";
    document.getElementById("alert_msg_id").innerHTML = alert_msg;
  }
</script>