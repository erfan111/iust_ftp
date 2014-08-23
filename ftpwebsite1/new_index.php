<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>وبسایت دانلود ftp دانشگاه علم و صنعت ایران</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/table.css">
    <!-- Script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- Favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >


    <!-- Meta -- for search -->

    <link rel="icon" href="favicon.png" type="image/x-icon">
    <!-- Load CSS -->
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <!-- Load Fonts -->

    <!-- Load jQuery library -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <!-- Load custom js -->

</head>

<body>

<!-- Header
================================================== -->
<header id="home">

    <nav id="nav-wrap">

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

        <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home" dir="rtl">جست و جو</a></li>
            <li><a class="smoothscroll" href="#about">برنامه های پیشنهادی</a></li>
            <li><a class="smoothscroll" href="#portfolio">گروه ها</a></li>
            <li><a class="smoothscroll" href="#testimonials">درباره ما</a></li>
            <li><a class="smoothscroll" href="#contact">تماس با ما</a></li>
        </ul> <!-- end #nav -->

    </nav> <!-- end #nav-wrap -->

    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline"> مرکز دانلود </h1>
            <h3>بانک نرم افزار دانشگاه علم و صنعت ایران</h3>
        </div>
        <div id="main">

            <!-- Main Title -->


            <h3>برنامه مورد نظرتان را جست و جو کنید:</h3>
            <!-- Main Input -->
            <input type="text" id="search" autocomplete="off" >

            <!-- Show Results -->
            <h4 id="results-text" dir="rtl">نشان دادن نتایج جست و جو برای: <b id="search-string">Array</b></h4>
            <ul id="results"></ul>


        </div>
    </div>

    <p class="scrolldown">
        <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
    </p>

</header> <!-- Header End -->


<!-- About Section
================================================== -->
<section id="about">

    <div class="row">

        <div class="twelve columns collapsed">

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                <!------------------------------------------------------------------>
                <?php
                $dbhost = "localhost";
                $dbname = "iustftpdb";
                $dbuser = "erfan";
                $dbpass = "ryangiggs";

                //	Connection
                global $mv;

                $mv = new mysqli();
                $mv->connect($dbhost, $dbuser, $dbpass, $dbname);
                $mv->set_charset("utf8");

                //	Check Connection
                if ($mv->connect_errno) {
                    printf("Connect failed: %s\n", $mv->connect_error);
                    exit();
                }
                $query = "SELECT * FROM ftpt ORDER BY dltimes DESC LIMIT 8" ;
                // Do Search
                $result1 = $mv->query($query);

                while($results = $result1->fetch_array()) {
                    global $result_array;
                    $result_array[] = $results;
                }

                // Check If We Have Results
                if (isset($result_array)) {
                    $num = 0;
                    foreach ($result_array as $GLOBALS['result']) {
                        $num++;
                        echo("<div class='columns portfolio-item'>");
                        echo('<div class="item-wrap">');
                        $format = '<a href="#modal-0'.$num.'">';
                        echo($format);
                        $format =  '<img alt="" src="'.$result['img'].'">'.'<div class="overlay">'.'<div class="portfolio-item-meta">';
                        echo($format);
                        echo('<h5>'.$result['name'].'</h5>');
                        echo('<p>' . $result['desc'].'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="link-icon"><i class="icon-plus"></i></div>');
                        echo('</a>');
                        echo('</div>');
                        echo('</div>');
                    }
                }
                ?>
                <!------------------------------------------------------------------>


            </div> <!-- portfolio-wrapper end -->

        </div> <!-- twelve columns end -->
    </div>

</section> <!-- About Section End-->

<!-- Portfolio Section
================================================== -->
<section id="portfolio">

    <div class="datagrid"><table>

            <tfoot><tr><td colspan="5"><div id="no-paging">&nbsp;</div></tr></tfoot>
            <tbody><tr><td class="tbl"><a href="group.php?cat=0">test</a></td><td>data</td><td>data</td><td>data</td><td>data</td></tr>
            <tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td><td>data</td></tr>
            <tr><td>data</td><td>data</td><td>data</td><td>data</td><td>data</td></tr>
            <tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td><td>data</td></tr>
            <tr><td>data</td><td>data</td><td>data</td><td>data</td><td>data</td></tr>
            </tbody>
        </table></div>


<!-- Modal Popup
 --------------------------------------------------------------- -->
<?php
    if (isset($result_array)) {
        $num = 0;
        foreach ($result_array as $result) {
            $num++;
            echo('<div id="modal-0'.$num.'" class="popup-modal mfp-hide"'.'<br>');
                $format =  '<img class="scale-with-grid" src="'.$result['img'].'">'.'<div class="description-box">'.'<h4>'.$result['name'].'</h4>'.'<p>'.$result['desc'].'</p>';
                echo($format);
                echo('</div>');
                echo('<div class="link-box">');
                echo('<a class="dl" href="'.$result['address'].'">دانلود</a>');
                echo('<a class="popup-modal-dismiss">بستن</a>');
                echo('</div>');
                echo('</div>');
            echo('</div>');
}
}
?>



</section> <!-- Portfolio Section End-->

<!-- Testimonials Section
================================================== -->
<section id="testimonials">

    <div class="text-container">

        <div class="row">



            <div class="ten columns flex-container">

                <div class="flexslider">

                    <ul class="slides">

                        <li>
                            <blockquote>
                                <p dir="rtl">
                                    این سایت به منظور تسهیل دسترسی به هزاران برنامه موجود در ftp دانشگاه توسط دفتر فرهنگی دانشکده کامپیوتر ایجاد شده است. <br> برنامه های موجود در ftp به تازگی بروز رسانی شده اند و درخواست های شما برای اضافه کردن برنامه های مورد نیازتان در اسرع وقت در آن قرار  خواهد گرفت.                           </p>

                            </blockquote>
                        </li> <!-- slide ends -->

                        <li>
                            <blockquote>
                                <p>لطفا درخواست های قرار دادن برنامه مورد نظرتان در سایت را از طریق فرم ایجاد شده برای ما ارسال فرمایید
                                </p>
                            </blockquote>
                        </li> <!-- slide ends -->

                    </ul>

                </div> <!-- div.flexslider ends -->

            </div> <!-- div.flex-container ends -->

        </div> <!-- row ends -->

    </div>  <!-- text-container ends -->

</section> <!-- Testimonials Section End-->


<!-- Contact Section
================================================== -->
<section id="contact">

    <div class="row section-head">


        <div class="ten columns">

            <p dir="rtl" class="lead"> برای ارسال انتقادات و پیشنهادات و درخواست برنامه از فرم زیر استفاده کنید.در صورت ارایه اطلاعات تماس  با شما در ارتباط خواهیم بود.
            </p>

        </div>

    </div>

    <div class="row">

        <div class="eight columns">

            <!-- form -->
            <form action="" method="post" id="contactForm" name="contactForm" dir="rtl">
                <fieldset dir="rtl">

                    <div>
                        <label class="test" for="contactName">نام: </label>
                        <input type="text" value="" size="35" id="contactName" name="contactName">
                    </div>

                    <div>
                        <label for="contactEmail">ایمیل: </label>
                        <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                    </div>

                    <div>
                        <label for="contactSubject">موضوع</label>
                        <input type="text" value="" size="35" id="contactSubject" name="contactSubject">
                    </div>

                    <div>
                        <label for="contactMessage">پیغام: </label>
                        <textarea cols="50" rows="15" id="contactMessage" name="contactMessage"></textarea>
                    </div>

                    <div>
                        <button >ارسال</button>
                     <span id="image-loader">
                        <img alt="" src="images/loader.gif">
                     </span>
                    </div>

                </fieldset>
            </form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning">خطا!</div>
            <!-- contact-success -->
            <div id="message-success">
                <i class="fa fa-check"></i>با تشکر.پیغام شما ارسال شد.<br>
            </div>

        </div>


        <aside class="four columns footer-widgets">

            <div class="widget widget_contact">

                <h4>ارتباط با ما</h4>
                <p class="address">
                    دفتر فرهنگی دانشکده کامپیوتر<br>
                    دانشکده کامپیوتر طبقه -۱ سایت کارشناسی <br>
                    email@email.com<br>
                    <span>site.site</span>
                </p>

            </div>



        </aside>

    </div>

</section> <!-- Contact Section End-->


<!-- footer
================================================== -->
<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="social-links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>

            <ul class="copyright">
                <li dir="rtl">طراحی و اجرا <br><a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a> ||&nbsp;<a href="admin_login.php">دفتر فرهنگی دانشکده کامپیوتر</a></li>
            </ul>

        </div>

        <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>

    </div>

</footer> <!-- Footer End-->

<!-- Java Script
================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

<script src="js/jquery.flexslider.js"></script>
<script src="js/waypoints.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/magnific-popup.js"></script>
<script src="js/init.js"></script>

</body>

</html>