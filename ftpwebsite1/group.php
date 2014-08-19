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
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold" type="text/css" />
    <!-- Load jQuery library -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript" src="scripts/custom.js"></script>
    <!-- Load custom js -->

</head>

<body>
<section id="about">

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
                $mv->connect($dbhost, $dbuser, $dbpass, $dbname);
                $mv->set_charset("utf8");
                //  Check Connection
                if ($mv->connect_errno) {
                    printf("Connect failed: %s\n", $mv->connect_error);
                    exit();
                }
                
                //use catId instead of GET one.
                $catId=$_GET['cat'];
                
                //scape sql injection
                $catId = $mv->real_escape_string($catId);
                
                //select the category
                $query = "SELECT * FROM catt WHERE id =".$catId ;
                $result = $mv->query($query);
                //Optimize this if block!!!###
                if (!$result) {
                    //echo "There is no cat with this id!!!";
                    echo 'Could not run query: ' . mysql_error();
                    exit;
                }
                $cat = $result->fetch_row();
                echo "
                    <!-- portfolio-wrapper -->
                    <div id='portfolio-wrapper' class='bgrid-quarters s-bgrid-thirds cf'> 
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
                        echo("<div class='columns portfolio-item'>");
                        echo('<div class="item-wrap">');
                        $format = '<a href="#modal-0'.$num.'">';
                        echo($format);
                        $format =  '<img alt="" src="'.$result[img].'">'.'<div class="overlay">'.'<div class="portfolio-item-meta">';
                        echo($format);
                        echo('<h5>'.$result[name].'</h5>');
                        echo('<p>' . $result[desc].'</p>');
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

<section id="portfolio">

    <!-- Modal Popup
     --------------------------------------------------------------- -->
    <?php
    if (isset($result_array)) {
        $num = 0;
        foreach ($result_array as $result) {
            $num++;
            echo('<div id="modal-0'.$num.'" class="popup-modal mfp-hide"');
            $format =  '<img class="scale-with-grid" src="'.$result[img].'">'.'<div class="description-box">'.'<h4>'.$result[name].'</h4>'.'<p>'.$result[desc].'</p>';
            echo($format);
            echo('</div>');
            echo('<div class="link-box">');
            echo('<a href="'.$result[address].'دانلود</a>');
            echo('<a class="popup-modal-dismiss">بستن</a>');
            echo('</div>');
            echo('</div>');
            echo('</div>');
        }
    }
    ?>

    </div> <!-- row End -->

</section> <!-- Portfolio Section End-->
</body>
</html>