<?php
session_start();
require_once 'admin/database/db-con.php';
?>

<?php

if (isset($_GET['page'])) {
    $page_no = $_GET['page'];
} else {
    $page_no = 1;
}
$post_per_page = 5;
$offset = $post_per_page * ($page_no - 1);

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

    <!-- Header -->
    <?php
    require_once('elements/landing-header.php');
    ?>

    <!-- ... end Header -->


    <div class="main-content-wrapper">
        <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12 mb60">
                        <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                            <!-- Google Tag Manager -->
                            <script>
                                (function(w, d, s, l, i) {
                                    w[l] = w[l] || [];
                                    w[l].push({
                                        'gtm.start': new Date().getTime(),
                                        event: 'gtm.js'
                                    });
                                    var f = d.getElementsByTagName(s)[0],
                                        j = d.createElement(s),
                                        dl = l != 'dataLayer' ? '&l=' + l : '';
                                    j.async = true;
                                    j.src =
                                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                                    f.parentNode.insertBefore(j, f);
                                })(window, document, 'script', 'dataLayer', 'GTM-TKGD7NP');
                            </script>
                            <!-- End Google Tag Manager -->
                            <div class="heading-sup-title">NEWS</div>
                            <h2 class="heading-title heading--half-colored">Stay informed about our news</h2>
                            <div class="heading-text">Investigationes demonstraverunt lectores legere elementum pulvinar etiam non quam lacus suspendisse risus nec feugiat in laoreet sit amet cursus.</div>
                        </header>
                    </div>
                    <div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-with-btn-inline">
                            <input id='name' name="name" placeholder="Your Email Address" type="text" value="">
                            <button class="btn btn--large btn--green-light">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="medium-padding120">
            <div class="container">
                <div class="row pb60">
                    <!-- Blog posts-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <?php
                        $query1 = "SELECT * FROM blog WHERE `is_deleted` = 0 LIMIT $offset, $post_per_page";
                        $run_query1 = mysqli_query($con, $query1);
                        $index = 0;
                        if (mysqli_num_rows($run_query1) > 0) {
                            while ($data1 = mysqli_fetch_assoc($run_query1)) {
                                $index++;
                                $blog_id = $data1['id'];
                                $blog_title = $data1['blog_title'];
                                $category_first_id = $data1['category_first_id'];
                                $view = $data1['view'];
                                $total_share = $data1['sharing'];
                                $total_likes = $data1['likes'];
                                $thumbnail_img = $data1['thumbnail_img'];
                                $unique_link = $data1['unique_link'];

                                $query2 = "SELECT * FROM `category_list` WHERE `id` = $category_first_id";
                                $run_query2 = mysqli_query($con, $query2);
                                $data2 = mysqli_fetch_assoc($run_query2);
                        ?>
                                <article class="hentry post post-standard has-post-thumbnail video">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="post__date">
                                                <a href="#" class="number">08</a>
                                                <time class="published" datetime="2018-03-08 12:00:00">
                                                    March, 2018
                                                </time>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="post-thumb">
                                                <img src="assets/img/post3.jpg" alt="post">
                                                <div class="overlay overlay-blog"></div>
                                                <a href="https://www.youtube.com/watch?v=MBdVXkSdhwU" class="video-control video-control-youtube js-popup-iframe">
                                                    <i class="woox-icon fas fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="post__content">

                                                <a href="010_news_details.html" class="h3 post__title entry-title">Orci dapibus ultrices in iaculis nunc sed augue lacus dui faucibus</a>

                                                <p class="post__text">Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper. Augue mauris augue neque gravida in fermentum et sollicitudin. Amet risus nullam eget felis eget.</p>

                                                <div class="post-additional-info">
                                                    <a href="010_news_details.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
                                                        Read More
                                                        <svg class="woox-icon icon-arrow-right">
                                                            <use xlink:href="#icon-arrow-right"></use>
                                                        </svg>
                                                    </a>

                                                    <div class="btn btn--round btn--share btn--share-js">
                                                        <svg class="woox-icon icon-share">
                                                            <use xlink:href="#icon-share"></use>
                                                        </svg>
                                                        <div class="shared-wrap">
                                                            <ul class="socials">
                                                                <li class="social-item">
                                                                    <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                        <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                            <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                            <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                                <li class="social-item">
                                                                    <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                        <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                            <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                            <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                                <li class="social-item">
                                                                    <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                        <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                            <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                            <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </article>
                        <?php
                            }
                        }
                        ?>

                        <article class="hentry post post-standard quote">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">19</a>
                                        <time class="published" datetime="2018-02-19 12:00:00">
                                            February, 2018
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="post__content">

                                        <blockquote class="quote--post-type">
                                            <p>
                                                <svg class="woox-icon icon-quote-icon quote">
                                                    <use xlink:href="#icon-quote-icon"></use>
                                                </svg>
                                                <svg class="woox-icon icon-quote-icon2 quote quote-close">
                                                    <use xlink:href="#icon-quote-icon2"></use>
                                                </svg>
                                                Qel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros.
                                            </p>

                                            <div class="post-additional-info">
                                                <div class="btn btn--round btn--share btn--share-js">
                                                    <svg class="woox-icon icon-share">
                                                        <use xlink:href="#icon-share"></use>
                                                    </svg>
                                                    <div class="shared-wrap">
                                                        <ul class="socials">
                                                            <li class="social-item">
                                                                <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                    <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                        <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                        <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li class="social-item">
                                                                <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                    <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                        <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                        <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li class="social-item">
                                                                <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                    <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                        <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                        <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </blockquote>

                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="author-block author-block--column-start">
                                        <div class="avatar avatar60">
                                            <img src="assets/img/author2.jpg" alt="avatar">
                                        </div>
                                        <div class="author-content">
                                            <a href="#" class="author-name">Philip Demarco</a>
                                            <div class="author-prof">founder of agency</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                        <article class="hentry post post-standard has-post-thumbnail">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">03</a>
                                        <time class="published" datetime="2018-02-03 12:00:00">
                                            February, 2018
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post-thumb">
                                        <img src="assets/img/post4.jpg" alt="post">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="post__content">

                                        <a href="010_news_details.html" class="h3 post__title entry-title">Tortor pretium viverra suspendisse potenti nullam</a>

                                        <p class="post__text">Orci ac auctor augue mauris augue neque. Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper. Augue mauris augue neque gravida in fermentum et sollicitudin. Amet risus nullam eget felis eget.</p>

                                        <div class="post-additional-info">
                                            <a href="010_news_details.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
                                                Read More
                                                <svg class="woox-icon icon-arrow-right">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                            </a>

                                            <div class="btn btn--round btn--share btn--share-js">
                                                <svg class="woox-icon icon-share">
                                                    <use xlink:href="#icon-share"></use>
                                                </svg>
                                                <div class="shared-wrap">
                                                    <ul class="socials">
                                                        <li class="social-item">
                                                            <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                    <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                    <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                    <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                    <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="hentry post post-standard has-post-thumbnail slider">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">03</a>
                                        <time class="published" datetime="2018-02-03 12:00:00">
                                            February, 2018
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="post-thumb">
                                        <div class="crumina-module crumina-module-slider pagination-bottom-center">

                                            <div class="swiper-container" data-show-items="1" data-prev-next="1">

                                                <div class="swiper-wrapper">

                                                    <div class="swiper-slide">
                                                        <img src="assets/img/post5.jpg" alt="video">
                                                    </div>

                                                    <div class="swiper-slide">
                                                        <img src="assets/img/post5.jpg" alt="video">
                                                    </div>

                                                    <div class="swiper-slide">
                                                        <img src="assets/img/post5.jpg" alt="video">
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- If we need pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post__content">

                                        <a href="010_news_details.html" class="h3 post__title entry-title">Ut placerat orci nulla pellentesque dignissim enim sit accumsan</a>

                                        <p class="post__text">Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper. Augue mauris augue neque gravida in fermentum et sollicitudin. Amet risus nullam eget felis eget quis hendrerit dolor eget malesuada pellentesque.</p>

                                        <div class="post-additional-info">
                                            <a href="010_news_details.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
                                                Read More
                                                <svg class="woox-icon icon-arrow-right">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                            </a>

                                            <div class="btn btn--round btn--share btn--share-js">
                                                <svg class="woox-icon icon-share">
                                                    <use xlink:href="#icon-share"></use>
                                                </svg>
                                                <div class="shared-wrap">
                                                    <ul class="socials">
                                                        <li class="social-item">
                                                            <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                    <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                    <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                    <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                    <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="hentry post post-standard has-post-thumbnail link">

                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">22</a>
                                        <time class="published" datetime="2018-01-22 12:00:00">
                                            January, 2018
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-11">
                                    <div class="post-thumb">
                                        <a href="010_news_details.html" class="h4 post__title entry-title">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</a>
                                        <p class="post__text">
                                            Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper.
                                        </p>
                                        <a href="#" class="site-link">www.themeforest.com</a>
                                        <div class="post-additional-info">
                                            <div class="btn btn--round btn--share btn--share-js">
                                                <svg class="woox-icon icon-share">
                                                    <use xlink:href="#icon-share"></use>
                                                </svg>
                                                <div class="shared-wrap">
                                                    <ul class="socials">
                                                        <li class="social-item">
                                                            <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                    <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                    <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                    <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                    <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                        <article class="hentry post post-standard has-post-thumbnail">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">15</a>
                                        <time class="published" datetime="2018-01-15 12:00:00">
                                            January, 2018
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post-thumb">
                                        <img src="assets/img/post6.jpg" alt="post">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="post__content">

                                        <a href="010_news_details.html" class="h3 post__title entry-title">Sem integer vitae justo eget nunc congue nisi vitae</a>

                                        <p class="post__text">Orci ac auctor augue mauris augue neque. Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper. Augue mauris augue neque gravida in fermentum et sollicitudin. Amet risus nullam eget felis eget.</p>

                                        <div class="post-additional-info">
                                            <a href="010_news_details.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
                                                Read More
                                                <svg class="woox-icon icon-arrow-right">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                            </a>

                                            <div class="btn btn--round btn--share btn--share-js">
                                                <svg class="woox-icon icon-share">
                                                    <use xlink:href="#icon-share"></use>
                                                </svg>
                                                <div class="shared-wrap">
                                                    <ul class="socials">
                                                        <li class="social-item">
                                                            <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                    <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                    <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                    <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                    <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="hentry post post-standard has-post-thumbnail audio">

                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="post__date">
                                        <a href="#" class="number">28</a>
                                        <time class="published" datetime="2017-12-22 12:00:00">
                                            December, 2017
                                        </time>
                                    </div>
                                </div>
                                <div class="col-lg-11">
                                    <div class="post-thumb">
                                        <iframe height="180" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/365525435&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                    </div>
                                    <div class="post__content">

                                        <a href="010_news_details.html" class="h3 post__title entry-title">Viverra maecenas accumsan</a>

                                        <p class="post__text">Orci ac auctor augue mauris augue neque. Felis eget velit aliquet sagittis id consectetur. In mollis nunc sed id semper. Augue mauris augue neque gravida in fermentum et sollicitudin. Amet risus nullam eget felis eget interdum velit euismod in pellentesque massa.</p>

                                        <div class="post-additional-info">
                                            <a href="010_news_details.html" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
                                                Read More
                                                <svg class="woox-icon icon-arrow-right">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                            </a>

                                            <div class="btn btn--round btn--share btn--share-js">
                                                <svg class="woox-icon icon-share">
                                                    <use xlink:href="#icon-share"></use>
                                                </svg>
                                                <div class="shared-wrap">
                                                    <ul class="socials">
                                                        <li class="social-item">
                                                            <a data-sharer="facebook" data-hashtag="hashtag" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#3b5998" />
                                                                    <path fill="#fff" d="M70.2 58.3h-10v36.67H45.01V58.29h-7.2V45.41h7.2v-8.34c0-5.97 2.84-15.3 15.3-15.3l11.24.04v12.51H63.4c-1.34 0-3.22.67-3.22 3.51v7.59h11.34L70.2 58.29z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="buffer" data-via="ellisonleao" data-picture="https://ellisonleao.github.io/sharer.js/assets/img/socialbg.png" data-title="Sharer.js is the ultimate sharer js lib" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 112.2 112.2" class="woox-icon">
                                                                    <circle cx="56.1" cy="56.1" r="56.1" fill="#55acee" />
                                                                    <path fill="#f1f2f2" d="M90.46 40.32a26.75 26.75 0 0 1-7.7 2.1 13.45 13.45 0 0 0 5.9-7.41 26.84 26.84 0 0 1-8.52 3.25A13.41 13.41 0 0 0 57.3 50.5a38.06 38.06 0 0 1-27.64-14 13.4 13.4 0 0 0 4.15 17.9c-2.2-.08-4.26-.68-6.07-1.69v.17c0 6.5 4.62 11.92 10.75 13.15a13.36 13.36 0 0 1-6.05.23c1.7 5.33 6.66 9.2 12.52 9.32a26.9 26.9 0 0 1-19.85 5.55 37.93 37.93 0 0 0 20.56 6.02C70.32 87.14 83.8 66.71 83.8 49c0-.58-.02-1.16-.04-1.73a27.2 27.2 0 0 0 6.7-6.94z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="social-item">
                                                            <a data-sharer="pinterest" data-url="https://ellisonleao.github.io/sharer.js/">
                                                                <svg viewBox="0 0 473.9 473.9" class="woox-icon">
                                                                    <circle cx="237" cy="237" r="237" fill="#d42028" />
                                                                    <path fill="#fff" d="M173.4 123.1c-35.6 14.1-59.8 41.3-66.6 77.9-4.2 22.5-2.6 47 7.4 68 2.2 4.7 4.9 9.2 8 13.3 1.5 2 3.2 4 5 5.8 3.2-1.1 6.2-2.5 9.1-4.2 12-6.8 20.9-17.3 31.2-26.1-34.5-39.9 2.1-89.4 47.7-100.4 42.5-10.3 100.2 7.4 113.1 51.2 5.3 18.1 1.8 38.2-12.9 51.3-7.7 6.9-17.5 11.4-27.9 13.3a66.8 66.8 0 0 1-18.4.6c-3.4-.3-6.8-.9-10.1-1.7-5.7-1.3-10.7-1.1-10.7-7.2v-71.8c0-4.9.5-4-3.6-4.5-3.2-.4-6.4-.7-9.6-1-11.3-.9-23.1-1.5-34.3.4-4.2.7-4.5 0-4.5 4.6v37.8c0 26.7 2 53.8.9 80.4-.3 8-.5 27-9.4 31-10.3 4.6-19.4-5.1-28.9-7.1 1.3 13.4-7.1 39.9 8.5 46.7 14.3 6.2 30.8 8.5 45.9 3.4 31.6-10.7 41.8-45.9 37.8-74.8 48.8 14.6 101.5-9.8 122.4-53.9 14.9-31.4 8.6-70.4-13.8-97.1-41.9-49.8-127-59.4-186.3-35.9z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </article>

                    </div>
                    <!-- End Blog posts-->

                </div>

                <hr class="divider">




            </div>
        </section>

    </div>
    <!-- Footer -->

    <?php
    require_once('elements/landing-footer.php');
    ?>

    <!-- ... end Footer -->


    <script src="assets/js/method-assign.js"></script>

    <!-- jQuery first, then Other JS. -->

    <script src="assets/js/jquery-3.3.1.js"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDpqPQbjKiY7zSvLyPRIWWOfG1XiuhhYg" async defer></script>

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

    <!-- FontAwesome 5.x.x JS -->

    <script defer src="fonts/fontawesome-all.js"></script>

    <script src="assets/js/main.js"></script>

    <!-- SVG icons loader -->
    <script src="assets/js/svg-loader.js"></script>
    <!-- /SVG icons loader -->

</body>

</html>


<!-- COMMENT CODE START -->

<div class="comments-wrap pt120">

    <div class="comments">

        <header class="crumina-module crumina-heading heading--h4 heading--with-decoration">
            <h4 class="heading-title">6 Comments</h4>
        </header>

        <ol class="comments__list">
            <li class="comments__item">
                <div class="comment-entry comment comments__article">

                    <div class="comments__avatar">
                        <img src="assets/img/author2.jpg" alt="avatar">
                    </div>

                    <div class="comments__body">

                        <header class="comment-meta comments__header">


                            <cite class="fn url comments__author">
                                <a href="#" rel="external">Philip Demarco</a>
                            </cite>

                            <div class="comments__time">
                                <time class="published" datetime="2018-03-14 12:36:00">March 14, 2018 at 12:36 pm</time>
                            </div>

                        </header>

                        <div class="comment-content comment">
                            <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt
                                saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem
                                consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.
                            </p>
                        </div>

                        <a href="#" class="reply">Reply</a>

                    </div>

                </div>
                <!-- <ol class="children">
											<li class="comments__item">

												<div class="comment-entry comment comments__article">

													<div class="comments__avatar">
														<img src="assets/img/author3.jpg" alt="avatar">
													</div>


													<div class="comments__body">


														<header class="comment-meta comments__header">


															<cite class="fn url comments__author">
																<a href="#" rel="external">Angelina Johnson</a>
															</cite>

															<div class="comments__time">
																<time class="published" datetime="2018-03-14 12:36:00">March 14, 2018 at 12:36 pm</time>
															</div>

														</header>


														<div class="comment-content comment">
															<p>Mirum est notare quam littera gothica, quam nunc putamus parum.</p>
														</div>

														<a href="#" class="reply">Reply</a>

													</div>

												</div>
											</li>
										</ol> -->
            </li>
        </ol>

    </div>

    <header class="crumina-module crumina-heading heading--h3 heading--with-decoration">

        <h4 class="heading-title">Leave a Comment</h4>
    </header>

    <p class="f-size-14">Your email address will not be published.
        <span class="c-link-color">Required fields are marked</span> <span class="abbr"> *</span>
    </p>

    <form class="contact-form leave-reply" method="post">
        <div class="row">

            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <label for="name6" class="input-label">Comment</label>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <textarea class="form-control input--dark input--squared height-140" name="message" id="name6" placeholder="Write your comment here..."></textarea>

                <input type="submit" name="submit_comment" value="Submit Comment" class="btn btn--large btn--transparent btn--primary">
            </div>

        </div>
    </form>

</div>
<!-- COMMENT CODE END -->