<?php
session_start();
require_once 'admin/database/db-con.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   <meta name="description" content="TSIT - World's No 1 Crypto Scam Database" />
   <meta name="keywords" content="TSIT, Crypto Scam" />
   <meta name="author" content="Anzarkhan.com" />
   <title>Tesla Academy</title>
   <link rel="icon" type="image/png" href="assets/img/favicon.png" />
   <link rel="stylesheet" type="text/css" href="assets/css/plugins.css" />
   <link rel="stylesheet" type="text/css" href="assets/css/theme-styles.css" />
   <link rel="stylesheet" type="text/css" href="assets/css/blocks.css" />
   <link rel="stylesheet" type="text/css" href="assets/css/widgets.css" />
   <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
   <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet" />
</head>

<body class="crumina-grid">
   <?php
   require_once('elements/landing-header.php');
   ?>
   <div class="main-content-wrapper">

      <!-- Hero section -->
      <section style="padding:150px 0px" class="bg-1">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb30">
                  <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                     <!-- End Google Tag Manager -->
                     <h2 class="heading-title heading--half-colored">Use our cryptocoins
                        <span class="weight-bold">converter</span>
                     </h2>
                     <div class="heading-text">Investigationes demonstraverunt lectores legere elementum pulvinar etiam non quam lacus suspendisse id volutpat lacus laoreet.</div>
                  </header>
                  <a href="start-here.php" class="primary-link-with-icon">Start here
                     <svg class="woox-icon icon-arrow-right">
                        <use xlink:href="#icon-arrow-right"></use>
                     </svg>
                  </a>
               </div>
               <?php
               //leatest post
               $latest_post = "SELECT * FROM blog ORDER BY id DESC LIMIT 1";
               $run_latest_post = mysqli_query($con, $latest_post);
               $latest_post_row = mysqli_fetch_assoc($run_latest_post);
               $blog_id = $latest_post_row['id'];
               $blog_title = $latest_post_row['blog_title'];
               $thumbnail_img = $latest_post_row['thumbnail_img'];
               $category_first_id = $latest_post_row['category_first_id'];
               $category_second_id = $latest_post_row['category_second_id'];
               $category_third_id = $latest_post_row['category_third_id'];

               //get category name from category_list first table
               $query2 = "SELECT * FROM `category_list` WHERE `id` = $category_first_id";
               $run_query2 = mysqli_query($con, $query2);
               $row2 = mysqli_fetch_array($run_query2);
               $category_name_first = $row2['name'];


               if ($category_second_id != 0) {
                  //get category name from category_list second table
                  $query3 = "SELECT * FROM `category_list` WHERE `id` = $category_second_id";
                  $run_query3 = mysqli_query($con, $query3);
                  $row3 = mysqli_fetch_array($run_query3);
                  $category_name_second = $row3['name'];
                  // echo 'we are in if';
               } else {
                  // echo 'we are in else';
                  $category_name_second = "";
               }


               // echo 'this is third id'.$category_third_id;
               if ($category_third_id != 0) {
                  //get category name from category_list second table
                  $query4 = "SELECT * FROM `category_list` WHERE `id` = $category_third_id";
                  $run_query4 = mysqli_query($con, $query4);
                  $row4 = mysqli_fetch_array($run_query4);
                  $category_name_third = $row4['name'];
               } else {
                  $category_name_third = "";
               }
               ?>
               <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="card bg-1" style="background-color: #000; padding:30px;border-radius:10px; width:400px; margin:auto;">
                     <div class="card-body">
                        <div style="background-image: url('admin/uploads/thumbnail-img/<?php echo $thumbnail_img; ?>');width: 100%!important; height: 200px; border-radius:10px; padding:20px;background-position: center;
                                       background-size: cover;">
                           <span href="#" class="coming-soon-label"><?php echo $category_name_first; ?></span>

                           <?php
                           //check if category_second_id is not 0
                           if ($category_second_id != 0) {
                           ?>
                              <span href="#" class="coming-soon-label"><?php echo $category_name_second; ?></span>
                           <?php
                           }
                           ?>
                           <?php
                           //check if category_third_id is not 0
                           if ($category_third_id != 0) {
                           ?>
                              <span href="" class="coming-soon-label"><?php echo $category_name_third; ?></span>
                           <?php
                           }
                           ?>
                        </div>
                        <div class="current-crypto" style="color: #fff; margin-top:20px;">
                           <a href="single-view.php?blog_unique_link=<?php echo $blog_unique_link; ?>">
                              <h5 class="pricing-title"><?php echo $blog_title; ?></h5>
                           </a>
                        </div>
                        <!-- <div class="heading-text">Investigationes demonstraverunt lectores legere elementum pulvinar etiam non quam lacus suspendisse id volutpat lacus laoreet.</div> -->

                        <a href="single-view.php?blog_unique_link=<?php echo $blog_unique_link; ?>" class="btn btn--large btn--dark-lighter btn--transparent full-width" style="margin-top: 20px;">Explore More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <!-- latest releases -->
      <section class="mt100">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-lg-6">
                  <p>Latest Releases</p>
               </div>
               <div class="col-md-6 col-lg-6">
                  <p style="float:right;"><a href="latest-post.php" class="btn btn--large btn--dark-lighter btn--transparent full-width">See all Latest Release</a></p>
               </div>
            </div>
            <div class="row">
               <?php
               //get all blog col
               $query = "SELECT * FROM `blog` WHERE `is_deleted` = 0 ORDER BY `id` DESC LIMIT 3";
               $run_query = mysqli_query($con, $query);
               if (mysqli_num_rows($run_query) > 0) {
                  while ($row = mysqli_fetch_array($run_query)) {
                     $blog_id = $row['id'];
                     $blog_title = $row['blog_title'];
                     $thumbnail_img = $row['thumbnail_img'];
                     $category_first_id = $row['category_first_id'];
                     $category_second_id = $row['category_second_id'];
                     $category_third_id = $row['category_third_id'];
                     $blog_unique_link = $row['unique_link'];
                     $blog_views = $row['view'];
                     $blog_likes = $row['likes'];
                     $blog_comments = $row['comment'];
                     $publish_date = $row['publish_date'];
                     //convert date format
                     $publish_date = date('d M Y', strtotime($publish_date));
                     $blog_body = $row['blog_body'];
                     $added_by = $row['added_by'];
                     //get user name
                     $query3 = "SELECT * FROM `users` WHERE `id` = '$added_by'";
                     $run_query3 = mysqli_query($con, $query3);
                     if (mysqli_num_rows($run_query3) > 0) {
                        while ($row3 = mysqli_fetch_array($run_query3)) {
                           $author_name = $row3['name'];
                        }
                     }

                     //convert views,likes and comments into k,m and b
                     if ($blog_views > 10000000) {
                        $blog_views = floor($blog_views / 10000000) . 'B';
                     } else if ($blog_views > 1000000) {
                        $blog_views = floor($blog_views / 1000000) . 'M';
                     } else if ($blog_views > 1000) {
                        $blog_views = floor($blog_views / 1000) . 'K';
                     }

                     if ($blog_likes > 10000000) {
                        $blog_likes = floor($blog_likes / 10000000) . 'B';
                     } else if ($blog_likes > 1000000) {
                        $blog_likes = floor($blog_likes / 1000000) . 'M';
                     } else if ($blog_likes > 1000) {
                        $blog_likes = floor($blog_likes / 1000) . 'K';
                     }

                     if ($blog_comments > 10000000) {
                        $blog_comments = floor($blog_comments / 10000000) . 'B';
                     } else if ($blog_comments > 1000000) {
                        $blog_comments = floor($blog_comments / 1000000) . 'M';
                     } else if ($blog_comments > 1000) {
                        $blog_comments = floor($blog_comments / 1000) . 'K';
                     }


                     //get category name from category_list first table
                     $query2 = "SELECT * FROM `category_list` WHERE `id` = $category_first_id";
                     $run_query2 = mysqli_query($con, $query2);
                     $row2 = mysqli_fetch_array($run_query2);
                     $category_name_first = $row2['name'];


                     if ($category_second_id != 0) {
                        //get category name from category_list second table
                        $query3 = "SELECT * FROM `category_list` WHERE `id` = $category_second_id";
                        $run_query3 = mysqli_query($con, $query3);
                        $row3 = mysqli_fetch_array($run_query3);
                        $category_name_second = $row3['name'];
                        // echo 'we are in if';
                     } else {
                        // echo 'we are in else';
                        $category_name_second = "";
                     }


                     // echo 'this is third id'.$category_third_id;
                     if ($category_third_id != 0) {
                        //get category name from category_list second table
                        $query4 = "SELECT * FROM `category_list` WHERE `id` = $category_third_id";
                        $run_query4 = mysqli_query($con, $query4);
                        $row4 = mysqli_fetch_array($run_query4);
                        $category_name_third = $row4['name'];
                     } else {
                        $category_name_third = "";
                     }
               ?>
                     <div class="col-md-4 col-lg-4">
                        <div class="crumina-module crumina-module-slider ">
                           <div class="crumina-module pricing-table--small">
                              <div class="pricing-thumb">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div style="background-image: url('admin/uploads/thumbnail-img/<?php echo $thumbnail_img; ?>');width: 100%!important; height: 200px; border-radius:10px; padding:20px;background-position: center;
                                       background-size: cover;">
                                          <span href="#" class="coming-soon-label"><?php echo $category_name_first; ?></span>

                                          <?php
                                          //check if category_second_id is not 0
                                          if ($category_second_id != 0) {
                                          ?>
                                             <span href="#" class="coming-soon-label"><?php echo $category_name_second; ?></span>
                                          <?php
                                          }
                                          ?>
                                          <?php
                                          //check if category_third_id is not 0
                                          if ($category_third_id != 0) {
                                          ?>
                                             <span href="#" class="coming-soon-label"><?php echo $category_name_third; ?></span>
                                          <?php
                                          }
                                          ?>
                                       </div>
                                       <!-- <img src="assets/img/post1.jpg" style="width: 100% !important; height:100%; border-radius:10px;"> -->
                                    </div>
                                    <div class="col-lg-12" style="padding:20px 10px">
                                       <a href="single-view.php?blog_unique_link=<?php echo $blog_unique_link; ?>">
                                          <h5 class="pricing-title"><?php echo $blog_title; ?></h5>
                                       </a>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 20px;">
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <p class="growth"><?php echo $publish_date; ?></p>
                                          </div>
                                          <div class="col-lg-6">
                                             <p><?php echo $author_name; ?></p>
                                          </div>
                                       </div>
                                       <!-- <a href="#" class="btn btn--large btn--dark-lighter btn--transparent full-width" style="margin-top: 20px;">Explore More</a> -->

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               <?php

                  }
               }
               ?>
            </div>
         </div>
      </section>

      <!-- is your business ready section -->
      <?php

         $query = "SELECT * FROM `blog` WHERE `is_deleted` = 0 ORDER BY `likes` DESC LIMIT 1";
         $run_query = mysqli_query($con, $query);
         if (mysqli_num_rows($run_query) > 0) {
            $row = mysqli_fetch_array($run_query);
               $blog_id = $row['id'];
               $blog_title = $row['blog_title'];
               $thumbnail_img = $row['thumbnail_img'];
               $category_first_id = $row['category_first_id'];
               $category_second_id = $row['category_second_id'];
               $category_third_id = $row['category_third_id'];
               $blog_unique_link = $row['unique_link'];
               $blog_views = $row['view'];
               $blog_likes = $row['likes'];
               $blog_comments = $row['comment'];
               $publish_date = $row['publish_date'];
               //convert date format
               $publish_date = date('d M Y', strtotime($publish_date));
               $blog_body = $row['blog_body'];
               $added_by = $row['added_by'];
               //get user name
               $query3 = "SELECT * FROM `users` WHERE `id` = '$added_by'";
               $run_query3 = mysqli_query($con, $query3);
               if (mysqli_num_rows($run_query3) > 0) {
                  while ($row3 = mysqli_fetch_array($run_query3)) {
                     $author_name = $row3['name'];
                     $user_img = $row3['user_img'];
                  }
               }

               //convert views,likes and comments into k,m and b
               if ($blog_views > 10000000) {
                  $blog_views = floor($blog_views / 10000000) . 'B';
               } else if ($blog_views > 1000000) {
                  $blog_views = floor($blog_views / 1000000) . 'M';
               } else if ($blog_views > 1000) {
                  $blog_views = floor($blog_views / 1000) . 'K';
               }

               if ($blog_likes > 10000000) {
                  $blog_likes = floor($blog_likes / 10000000) . 'B';
               } else if ($blog_likes > 1000000) {
                  $blog_likes = floor($blog_likes / 1000000) . 'M';
               } else if ($blog_likes > 1000) {
                  $blog_likes = floor($blog_likes / 1000) . 'K';
               }

               if ($blog_comments > 10000000) {
                  $blog_comments = floor($blog_comments / 10000000) . 'B';
               } else if ($blog_comments > 1000000) {
                  $blog_comments = floor($blog_comments / 1000000) . 'M';
               } else if ($blog_comments > 1000) {
                  $blog_comments = floor($blog_comments / 1000) . 'K';
               }


               //get category name from category_list first table
               $query2 = "SELECT * FROM `category_list` WHERE `id` = $category_first_id";
               $run_query2 = mysqli_query($con, $query2);
               $row2 = mysqli_fetch_array($run_query2);
               $category_name_first = $row2['name'];


               if ($category_second_id != 0) {
                  //get category name from category_list second table
                  $query3 = "SELECT * FROM `category_list` WHERE `id` = $category_second_id";
                  $run_query3 = mysqli_query($con, $query3);
                  $row3 = mysqli_fetch_array($run_query3);
                  $category_name_second = $row3['name'];
                  // echo 'we are in if';
               } else {
                  // echo 'we are in else';
                  $category_name_second = "";
               }


               // echo 'this is third id'.$category_third_id;
               if ($category_third_id != 0) {
                  //get category name from category_list second table
                  $query4 = "SELECT * FROM `category_list` WHERE `id` = $category_third_id";
                  $run_query4 = mysqli_query($con, $query4);
                  $row4 = mysqli_fetch_array($run_query4);
                  $category_name_third = $row4['name'];
               } else {
                  $category_name_third = "";
               }
            }
         
         ?> 
      <section class="mt100 crumina-module crumina-module-slider navigation-center-both-sides slider-events">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="crumina-module crumina-event-item">
                     <div class="event-thumb" data-swiper-parallax="100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; background-image: url('admin/uploads/thumbnail-img/<?php echo $thumbnail_img; ?>');">
                        <div class="overlay"></div>
                     </div>
                     <div class="event-content" data-swiper-parallax="-300" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        <h3 class="event-title"><?php echo $blog_title; ?></h3>
                        <div class="countdown-btn-wrap">

                           <a href="single-view.php?blog_unique_link=<?php echo $blog_unique_link; ?>" class="btn btn--medium btn--transparent btn--secondary">Details</a>
                        </div>
                     </div>

                     <div class="event-venue" data-swiper-parallax="-300" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        <div class="event-date">
                           <svg class="woox-icon icon-school-calendar">
                              <use xlink:href="#icon-school-calendar"></use>
                           </svg>
                           <?php echo $publish_date; ?>
                        </div>
                        <div class="event-date">
                           <svg class="woox-icon icon-placeholder">
                              <use xlink:href="#icon-placeholder"></use>
                           </svg>
                           <?php echo  $category_name_first; ?> 
                           <?php
                              if ($category_name_second != "") {
                                 echo '<span>/</span>' . $category_name_second;
                              }
                           ?>
                          
                           <?php
                              if ($category_name_third != "") {
                                 echo '<span>/</span>' . $category_name_third;
                              }
                              ?> 
                           
                        </div>
                        <div class="author-block">
                           <div class="avatar avatar60">
                              <img src="admin/uploads/user-img/<?php echo $user_img; ?>" alt="avatar">
                           </div>
                           <div class="author-content">
                              <a href="#" class="author-name"><?php echo  $author_name; ?></a>
                              <div class="author-prof">author</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- Essential Post -->
      <section class="mt100">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-lg-6">
                  <p>Essential Post</p>
               </div>
               <div class="col-md-6 col-lg-6">
                  <p style="float:right;"><a href="essential-post.php" class="btn btn--large btn--dark-lighter btn--transparent full-width">See all Essential Post</a></p>
               </div>
            </div>
            <div class="row">
               <?php
               //get all blog col
               $query2 = "SELECT * FROM `blog` WHERE `category_first_id` = 1 ORDER BY `id` DESC LIMIT 3";
               $run_query2 = mysqli_query($con, $query2);
               if (mysqli_num_rows($run_query2) > 0) {
                  while ($row2 = mysqli_fetch_array($run_query2)) {
                     $blog_id = $row2['id'];
                     $blog_title = $row2['blog_title'];
                     $thumbnail_img = $row2['thumbnail_img'];
                     $category_first_id = $row2['category_first_id'];
                     $category_second_id = $row2['category_second_id'];
                     $category_third_id = $row2['category_third_id'];
                     $blog_unique_link = $row2['unique_link'];
                     $blog_views = $row2['view'];
                     $blog_likes = $row2['likes'];
                     $blog_comments = $row2['comment'];
                     $publish_date = $row2['publish_date'];
                     //convert date format
                     $publish_date = date('d M Y', strtotime($publish_date));
                     $blog_body = $row2['blog_body'];
                     $added_by = $row2['added_by'];
                     //get user name
                     $query3 = "SELECT * FROM `users` WHERE `id` = '$added_by'";
                     $run_query3 = mysqli_query($con, $query3);
                     if (mysqli_num_rows($run_query3) > 0) {
                        while ($row3 = mysqli_fetch_array($run_query3)) {
                           $author_name = $row3['name'];
                        }
                     }

                     //convert views,likes and comments into k,m and b
                     if ($blog_views > 10000000) {
                        $blog_views = floor($blog_views / 10000000) . 'B';
                     } else if ($blog_views > 1000000) {
                        $blog_views = floor($blog_views / 1000000) . 'M';
                     } else if ($blog_views > 1000) {
                        $blog_views = floor($blog_views / 1000) . 'K';
                     }

                     if ($blog_likes > 10000000) {
                        $blog_likes = floor($blog_likes / 10000000) . 'B';
                     } else if ($blog_likes > 1000000) {
                        $blog_likes = floor($blog_likes / 1000000) . 'M';
                     } else if ($blog_likes > 1000) {
                        $blog_likes = floor($blog_likes / 1000) . 'K';
                     }

                     if ($blog_comments > 10000000) {
                        $blog_comments = floor($blog_comments / 10000000) . 'B';
                     } else if ($blog_comments > 1000000) {
                        $blog_comments = floor($blog_comments / 1000000) . 'M';
                     } else if ($blog_comments > 1000) {
                        $blog_comments = floor($blog_comments / 1000) . 'K';
                     }


                     //get category name from category_list first table
                     $query3 = "SELECT * FROM `category_list` WHERE `id` = $category_first_id";
                     $run_query3 = mysqli_query($con, $query3);
                     $row3 = mysqli_fetch_array($run_query3);
                     $category_name_first = $row3['name'];


                     if ($category_second_id != 0) {
                        //get category name from category_list second table
                        $query4 = "SELECT * FROM `category_list` WHERE `id` = $category_second_id";
                        $run_query4 = mysqli_query($con, $query4);
                        $row4 = mysqli_fetch_array($run_query4);
                        $category_name_second = $row4['name'];
                        // echo 'we are in if';
                     } else {
                        // echo 'we are in else';
                        $category_name_second = "";
                     }


                     // echo 'this is third id'.$category_third_id;
                     if ($category_third_id != 0) {
                        //get category name from category_list second table
                        $query5 = "SELECT * FROM `category_list` WHERE `id` = $category_third_id";
                        $run_query5 = mysqli_query($con, $query5);
                        $row5 = mysqli_fetch_array($run_query5);
                        $category_name_third = $row5['name'];
                     } else {
                        $category_name_third = "";
                     }


               ?>
                     <div class="col-md-4 col-lg-4">
                        <div class="crumina-module crumina-module-slider ">
                           <div class="crumina-module pricing-table--small">
                              <div class="pricing-thumb">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div style="background-image: url('admin/uploads/thumbnail-img/<?php echo $thumbnail_img; ?>');width: 100%!important; height: 200px; border-radius:10px; padding:20px;background-position: center;
                                       background-size: cover;">
                                          <span href="#" class="coming-soon-label"><?php echo $category_name_first; ?></span>

                                          <?php
                                          //check if category_second_id is not 0
                                          if ($category_second_id != 0) {
                                          ?>
                                             <span href="#" class="coming-soon-label"><?php echo $category_name_second; ?></span>
                                          <?php
                                          }
                                          ?>
                                          <?php
                                          //check if category_third_id is not 0
                                          if ($category_third_id != 0) {
                                          ?>
                                             <span href="#" class="coming-soon-label"><?php echo $category_name_third; ?></span>
                                          <?php
                                          }
                                          ?>
                                       </div>
                                       <!-- <img src="assets/img/post1.jpg" style="width: 100% !important; height:100%; border-radius:10px;"> -->
                                    </div>
                                    <div class="col-lg-12" style="padding:20px 10px">
                                       <a href="single-view.php?blog_unique_link=<?php echo $blog_unique_link; ?>">
                                          <h5 class="pricing-title"><?php echo $blog_title; ?></h5>
                                       </a>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 20px;">
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <p class="growth"><?php echo $publish_date; ?></p>
                                          </div>
                                          <div class="col-lg-6">
                                             <p><?php echo $author_name; ?></p>
                                          </div>
                                       </div>
                                       <!-- <a href="#" class="btn btn--large btn--dark-lighter btn--transparent full-width" style="margin-top: 20px;">Explore More</a> -->

                                    </div>
                                 </div>
                              </div>
                              <!-- <div class="price">
                           <div class="price-sup-title">1 Dash equals:</div>
                           <div class="price-value">$611.24
                           <div class="growth">+ 1.25%</div>
                        </div> -->
                           </div>
                        </div>
                     </div>
               <?php
                  }
               }
               ?>
            </div>
         </div>
      </section>

      <!-- Trending post -->
      <section class="mt100">
         <section data-settings="particles-1" class="main-section crumina-flying-balls bg-1" id="particle-668">
            <div class="container">
               <div class="row align-center mb60">
                  <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                     <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <!-- Google Tag Manager -->
                        <!-- End Google Tag Manager -->
                        <div class="heading-sup-title">EVENTS</div>
                        <h2 class="heading-title heading--half-colored">Upcoming <span class="weight-bold">events</span>
                        </h2>
                        <div class="heading-text">Investigationes demonstraverunt lectores legere elementum pulvinar etiam non quam lacus suspendisse risus nec feugiat in laoreet sit amet cursus.</div>
                     </header>
                  </div>
               </div>
            </div>
         </section>
         <div class="container">
            <div class="row sorting-container" id="portfolio-grid" data-layout="masonry" data-isotope="{&quot;masonry&quot;: { &quot;columnWidth&quot;: &quot;.grid-sizer&quot; }}" style="position: relative; height: 735.729px;">
               <div class="grid-sizer" style="position: absolute; left: 0%; top: 0px;"></div>
               <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 sorting-item" style="position: absolute; left: 0%; top: 0px;">
                  <div class="crumina-module crumina-event-item">
                     <div class="event-thumb bg-event5">
                        <div class="overlay"></div>
                     </div>
                     <div class="event-content">
                        <h4 class="event-title mb30">What is Bitcoin? A Step-By-Step Guide For Beginners</h4>
                        <a href="single-view-2.php" class="btn btn--medium btn--transparent btn--secondary">Details</a>
                     </div>

                     <div class="event-venue">
                        <div class="event-date">
                           <svg class="woox-icon icon-school-calendar">
                              <use xlink:href="#icon-school-calendar"></use>
                           </svg>
                           March 16, 2018
                        </div>
                        <div class="event-date">
                           <svg class="woox-icon icon-placeholder">
                              <use xlink:href="#icon-placeholder"></use>
                           </svg>
                           The Lakes Golf Course 400 S. Sepulveda Boulevard, El Segundo,
                        </div>
                        <div class="author-block">
                           <div class="avatar avatar60">
                              <img src="assets/img/author1-60.jpg" alt="avatar">
                           </div>
                           <div class="author-content">
                              <a href="index.php" class="author-name">Angelina Johnson</a>
                              <div class="author-prof">speaker</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 sorting-item" style="position: absolute; left: 66.6643%; top: 0px;">
                  <div class="crumina-module crumina-event-item event-item--content-column">
                     <div class="event-thumb bg-event6">
                        <div class="overlay"></div>
                     </div>
                     <div class="event-content">
                        <h4 class="event-title mb30">Is your business ready for a production blockchain rollout?</h4>
                        <a href="single-view-2.php" class="btn btn--medium btn--transparent btn--secondary">Details</a>
                     </div>

                     <div class="event-venue mt100">
                        <div class="event-date">
                           <svg class="woox-icon icon-school-calendar">
                              <use xlink:href="#icon-school-calendar"></use>
                           </svg>
                           March 16, 2018
                        </div>
                        <div class="event-date">
                           <svg class="woox-icon icon-placeholder">
                              <use xlink:href="#icon-placeholder"></use>
                           </svg>
                           Juarez &amp; Associates, 12139 National Boulevard, Los Angeles, CA, U.S.
                        </div>
                        <div class="author-block">
                           <div class="avatar avatar60">
                              <img src="assets/img/author5.jpg" alt="avatar">
                           </div>
                           <div class="author-content">
                              <a href="index.php" class="author-name">Peter Spenser</a>
                              <div class="author-prof">speaker</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 sorting-item" style="position: absolute; left: 0%; top: 396.753px;">
                  <div class="crumina-module crumina-event-item">
                     <div class="event-thumb">
                        <div class="overlay"></div>
                     </div>
                     <div class="event-content">
                        <h4 class="event-title mb30">What is Bitcoin? A Step-By-Step Guide For Beginners</h4>
                        <div class="author-block">
                           <div class="avatar avatar60">
                              <img src="assets/img/author1-200.jpg" alt="avatar">
                           </div>
                           <div class="author-content">
                              <a href="single-view-2.php" class="author-name">Frank Godman</a>
                              <div class="author-prof">speaker</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 sorting-item" style="position: absolute; left: 33.3322%; top: 396.753px;">
                  <div class="crumina-module crumina-event-item event-item--content-column">
                     <div class="event-thumb bg-event7">
                        <div class="overlay"></div>
                     </div>
                     <div class="event-content">
                        <a href="single-view-2.php" class="coming-soon-label">Coming Soon</a>
                        <h4 class="event-title mt100">Apply them in Your Own Routines</h4>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row align-center">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a href="post-list.php" class="btn btn--large btn--transparent btn--dark-lighter" id="load-more-button" data-load-link="events-to-load.html" data-container="portfolio-grid">Load More Events</a>
               </div>
            </div>
         </div>
      </section>


      <!-- Investment details -->
      <section class="medium-padding80 mt100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb30">

                  <ul class="crumina-module crumina-circled-block">
                     <li class="circle__item">
                        <img src="assets/img/paypal.png" class="woox-icon" alt="paypal">
                        <div class="title">PayPal</div>
                     </li>
                     <li class="circle__item">
                        <img src="assets/img/mastercard.png" class="woox-icon" alt="mastercard">
                        <div class="title">Mastercard</div>
                     </li>
                     <li class="circle__item">
                        <img src="assets/img/visa.png" class="woox-icon" alt="visa">
                        <div class="title">Visa</div>
                     </li>
                     <li class="circle__item">
                        <img src="assets/img/if_Bitcoin_2745023.png" class="woox-icon" alt="paypal">
                        <div class="title">Bitcoin</div>
                     </li>
                  </ul>

               </div>
               <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <header class="crumina-module crumina-heading heading--h2 heading--with-decoration pb60">
                     <!-- Google Tag Manager -->
                     <!-- End Google Tag Manager -->
                     <h2 class="heading-title heading--half-colored">Investment
                        <span class="weight-bold">details</span>
                     </h2>
                  </header>
                  <ul class="crumina-module crumina-accordion accordion--style3" id="accordion4">

                     <li class="accordion-panel">
                        <div class="panel-heading">
                           <a href="#toggleSample4" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                              <span class="icons">
                                 <svg class="woox-icon icon-plus-sign">
                                    <use xlink:href="#icon-plus-sign"></use>
                                 </svg>
                                 <svg class="woox-icon active icon-min">
                                    <use xlink:href="#icon-min"></use>
                                 </svg>
                              </span>
                              <span class="title">PLAN TO LAUNCH AN ICO?</span>
                           </a>
                        </div>

                        <div id="toggleSample4" class="panel-collapse collapse" aria-expanded="false" role="tree">
                           <div class="panel-info">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                              sint occaecat cupidatat non proident, sunt in culpa.
                           </div>
                        </div>
                     </li>

                     <li class="accordion-panel">
                        <div class="panel-heading">
                           <a href="#toggleOne4" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                              <span class="icons">
                                 <svg class="woox-icon icon-plus-sign">
                                    <use xlink:href="#icon-plus-sign"></use>
                                 </svg>
                                 <svg class="woox-icon active icon-min">
                                    <use xlink:href="#icon-min"></use>
                                 </svg>
                              </span>
                              <span class="title">BLOCKCHAIN AND SMART CONTRACTS</span>
                           </a>
                        </div>

                        <div id="toggleOne4" class="panel-collapse collapse" aria-expanded="false" role="tree">
                           <div class="panel-info">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                              sint occaecat cupidatat non proident, sunt in culpa.
                           </div>
                        </div>
                     </li>

                     <li class="accordion-panel">
                        <div class="panel-heading">
                           <a href="#toggleTwo4" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                              <span class="icons">
                                 <svg class="woox-icon icon-plus-sign">
                                    <use xlink:href="#icon-plus-sign"></use>
                                 </svg>
                                 <svg class="woox-icon active icon-min">
                                    <use xlink:href="#icon-min"></use>
                                 </svg>
                              </span>
                              <span class="title">RESEARCH &amp; DEVELOPMENT</span>
                           </a>
                        </div>

                        <div id="toggleTwo4" class="panel-collapse collapse" aria-expanded="false" role="tree">
                           <div class="panel-info">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                              sint occaecat cupidatat non proident, sunt in culpa.
                           </div>
                        </div>
                     </li>

                  </ul>
               </div>
            </div>
         </div>
      </section>
   </div>

   </div>
   <?php
   require_once('elements/landing-footer.php');
   ?>
   <script src="assets/js/method-assign.js"></script>
   <script src="assets/js/jquery-3.3.1.js"></script>
   <script src="assets/js/js-plugins/leaflet.js"></script>
   <script src="assets/js/js-plugins/MarkerClusterGroup.js"></script>
   <script src="assets/js/js-plugins/crum-mega-menu.js"></script>
   <script src="assets/js/js-plugins/waypoints.js"></script>
   <script src="assets/js/js-plugins/jquery-circle-progress.js"></script>
   <script src="assets/js/js-plugins/segment.js"></script>
   <script src="assets/js/js-plugins/bootstrap.js"></script>
   <script src="assets/js/js-plugins/imagesLoaded.js"></script>
   <script src="assets/js/js-plugins/jquery.matchHeight.js"></script>
   <script src="assets/js/js-plugins/jquery-countTo.js"></script>
   <script src="assets/js/js-plugins/Headroom.js"></script>
   <script src="assets/js/js-plugins/jquery.magnific-popup.js"></script>
   <script src="assets/js/js-plugins/popper.min.js"></script>
   <script src="assets/js/js-plugins/particles.js"></script>
   <script src="assets/js/js-plugins/perfect-scrollbar.js"></script>
   <script src="assets/js/js-plugins/jquery.datetimepicker.full.js"></script>
   <script src="assets/js/js-plugins/svgxuse.js"></script>
   <script src="assets/js/js-plugins/select2.js"></script>
   <script src="assets/js/js-plugins/smooth-scroll.js"></script>
   <script src="assets/js/js-plugins/sharer.js"></script>
   <script src="assets/js/js-plugins/isotope.pkgd.min.js"></script>
   <script src="assets/js/js-plugins/ajax-pagination.js"></script>
   <script src="assets/js/js-plugins/swiper.min.js"></script>
   <script src="assets/js/js-plugins/material.min.js"></script>
   <script src="assets/js/js-plugins/orbitlist.js"></script>
   <script src="assets/js/js-plugins/highstock.js"></script>
   <script src="assets/js/js-plugins/bootstrap-datepicker.js"></script>
   <script src="assets/js/js-plugins/TimeCircles.js"></script>
   <script src="assets/js/js-plugins/ion.rangeSlider.js"></script>
   <script defer src="assets/fonts/fontawesome-all.js"></script>
   <script src="assets/js/main.js"></script>
   <script src="assets/js/svg-loader.js"></script>
</body>

</html>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>