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
    <link rel="stylesheet" href="css/button.css">
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
    <!-- Load jQuery library -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <!-- Load custom js -->

</head>

<body>
<section id="suggestions">

    <div class="row">

        <div class="twelve columns collapsed">
            <?php
                $dbhost = "localhost";
                $dbname = "iustftpdb";
                $dbuser = "erfan";
                $dbpass = "ryangiggs";

                //  Connection
                global $mv;

                $mv = new mysqli();
                $mv0 = new mysqli();
                $mv->connect($dbhost, $dbuser, $dbpass, $dbname);
                $mv0->connect($dbhost, $dbuser, $dbpass, $dbname);
                $mv->set_charset("utf8");
                $mv0->set_charset("utf8");
                //  Check Connection
                if ($mv->connect_errno) {
                    printf("Connect failed: %s\n", $mv->connect_error);
                    exit();
                }
                
                //use catId instead of GET one.
                $catId=$_GET['cat'];
                
                //scape sql injection
                $catId = $mv->real_escape_string($catId);
                $query0 = "SELECT * from category WHERE id=".$_GET['cat'];
                $qResult0 = $mv0->query($query0);
                //select the category
                $the_name = $qResult0->fetch_array();

                echo('<h2 class="title" >'.$the_name['name'].'</h2>');
                ;
                echo('<br>');

                //Optimize this if block!!!###

                echo "
                    <!-- groups-wrapper -->
                    <div id='groups-wrapper' class='bgrid-quarters s-bgrid-thirds cf'>
                    <!------------------------------------------------------------------>
                    ";
                
                //Show the softwares
                //optimize this query to for asscending to download times ###
                $query = "SELECT * FROM ftpt WHERE cat =".$_GET['cat'] ;
                $qResult = $mv->query($query);

                while($results = $qResult->fetch_array()) {
                    global $result_array;
                    $result_array[] = $results;
                }

                // Check if we have any software then show them
                if (isset($result_array)) {
                    $num = 0;
                    foreach ($result_array as $GLOBALS['result']) {
                        $num++;
                        echo("<div class='columns groups-item'>");
                        echo('<div class="item-wrap">');
                        $format = '<a href="#modal-0'.$num.'">';
                        echo($format);
                        $format =  '<img alt="" src="'.$result['img'].'">'.'<div class="overlay">'.'<div class="groups-item-meta">';
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


            </div> <!-- groups-wrapper end -->

        </div> <!-- twelve columns end -->
<a class="bt" href="new_index.php" >بازگشت به صفحه اصلی</a>
</section> <!-- suggestions Section End-->

<section>

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



</section> <!-- groups Section End-->

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