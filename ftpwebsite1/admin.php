<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>admin  page</title>
    <meta name='adding application data to your database' content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/button.css">
    <!-- Script
    ================================================== -->

    <!-- Favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >


    <!-- Meta -- for search -->

    <link rel="icon" href="favicon.png" type="image/x-icon">



</head>
<body>
<div class="the_info">
    <a class="bt" href="admin_logout.php">Log Out</a>
    <a class="bt" href="new_index.php" >Go to index</a>
<?php
if (isset($_SESSION['admin_user'])) {
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $category = $_POST['category'];
        $desc = $_POST['desc'];
        $file= $_POST['file'];
        $the_image = $_FILES['the_image']['name'];
        $image_type = $_FILES['the_image']['type'];
        $image_size = $_FILES['the_image']['size'];
        if (isset($name) && isset($category) && isset($desc) && isset($file) && isset($the_image) ) {
            if ((($image_type == 'image/gif') || ($image_type == 'image/jpeg') || ($image_type == 'image/pjpeg') || ($image_type == 'image/png'))
                && ($image_size > 0) && ($image_size <= 1000999)) {
                if ($_FILES['the_image']['error'] == 0) {
                    // Move the file to the target upload folder
                    $target = "appimages/" . $the_image;
                    if (move_uploaded_file($_FILES['the_image']['tmp_name'], $target)) {

                        $dbhost = "localhost";
                        $dbname = "iustftpdb";
                        $dbuser = "erfan";
                        $dbpass = "ryangiggs";
                        $mv = new mysqli();
                        $mv->connect($dbhost, $dbuser, $dbpass, $dbname);
                        $mv->set_charset("utf8");

                        //	Check Connection
                        if ($mv->connect_errno) {
                            printf("Connect failed: %s\n", $mv->connect_error);
                            exit();
                        }
                        $query = "INSERT INTO ftpt VALUES (0, '".$name."', '".$desc."', ".$category.", '".$file."', '".$the_image."', 0)";

                        $result1 = $mv->query($query);

                                                                      // Confirm success with the user
                        echo "<p>File Successfully added</p>";
                        echo($query);
                        echo '<p><strong>name:</strong> ' . $name . '<br />';
                        echo '<strong>description:</strong> ' . $desc . '<br />';
                        echo '<strong>category:</strong> ' . $category . '<br />';
                        echo '<img class="small" src="appimages/' . $the_image . '" alt="the image" /></p>';


                        // Clear the score data to clear the form
                        $the_image = "";
                        $name = "";
                        $desc = "";
                        $file = "";
                        $category = "";
                    }
                    else {
                        echo '<p class="error">Sorry, there was a problem uploading your image.</p>';
                    }
                }
            }
            else {
                echo '<p class="error">فایل آپلود شده یا عکس نیست و یا حجم آن بیشتر از یک مگابایت است.</p>';
                echo($_FILES['the_image']['size']);
            }

            // Try to delete the temporary screen shot image file
            @unlink($_FILES['the_image']['tmp_name']);
        }
        else {
            echo '<p>Please provide all necessary information </p>';


        }
    }
}
?>
</div>


<?php
if (isset($_SESSION['admin_user'])) {
?>
    <div class="the_form">
    <p>فرم اضافه کردن محتوای ftp</p>
    <form class="forms" action="" method="post" id="contactForm" name="contactForm" dir="rtl" enctype="multipart/form-data">
        <fieldset dir="rtl">

            <div>
                <label class="test" for="name">Name:</label>
                <input type="text" value="" size="35" id="name" name="name">
            </div>

            <div>
                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="0">test1</option>
                    <option value="1">test2</option>

                </select>
            </div>

            <div>
                <label for="desc">Description:</label>
                <textarea cols="50" rows="8" id="desc" name="desc"></textarea>
            </div>

            <div>
                <label for="file">File URL:</label>
                <input type="url"  size="70" id="file" name="file">
            </div>
            <div>
                <label for="the_image">Image URL:</label>
                <input type="file"  id="the_image" name="the_image">
                <button class="submit" name="submit" type="submit">ارسال</button>
            </div>
            <div>

            </div>

        </fieldset>
    </form> <!-- Form End -->
    </div>
<?php
}
else {
    echo 'شما مجاز به دیدن این صفحه نیستید.لطفا وارد حساب ادمین شوید!';
}
?>
</body>
</html>