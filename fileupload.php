<?php

include './dbconnection.php';

if (isset($_POST['submit'])) {
    $stureg = "1000";

    //https://www.codemiles.com/php-tutorials/upload-pdf-file-in-php-t1486.html
    
    define("filesplace", "../files/dp");

    $sql = "INSERT INTO `submission`(`registraionNo`, `Sub_Type`, `Sub_ID`) VALUES ('$stureg', '1', '1')";
    if ($conn->query($sql) == TRUE) {
        if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {

            if ($_FILES['fileToUpload']['type'] != "application/pdf") {
                echo "<p>Class notes must be uploaded in PDF format.</p>";
            } else {

                $result = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], filesplace . "/$stureg.pdf");
                if ($result == 1)
                    echo "<script type='text/javascript'>window.onload = function() {if(confirm('Successfully Uploaded the DP???????!')==true){window.location.href = '../dp_submit.php';};};</script> "; // change this to redirect to the same page
                else
                    echo "<script type='text/javascript'>window.onload = function() {if(confirm('Error occured')==true){window.location.href = '../dp_submit.php';};};</script> "; // change this to redirect to the same page
            } #endIF
        } #endIF
    } else {
        echo "<script type='text/javascript'>window.onload = function() {if(confirm('Error occured')==true){window.location.href = '../dp_submit.php';};};</script> "; // change this to redirect to the same page
           
    }


    //file upload - blob

    /*
      $name = ($_FILES['fileToUpload']['name']);
      $f = ($_FILES['fileToUpload']['tmp_name']);
      $ftype = ($_FILES['fileToUpload']['type']);
      $cont = base64_encode(file_get_contents(addslashes($f)));

      if ($ftype == 'application/pdf') {
      $sql = "INSERT INTO `submission`(`registraionNo`, `Sub_Type`, `Sub_ID`, `file`) VALUES ('$stureg', '1', '1', '$cont')";
      if ($conn->query($sql) == TRUE) {
      echo 'done';
      } else {
      echo 'error';
      }
      } else {
      echo 'error type';
      echo $ftype;
      }


     */

    /*

      download file
      <?php
      $r="select * from file";
      $rs=$con->query($r);
      while($q=$rs->fetch_assoc()){
      $file=base64_decode(stripslashes($q['Fdata']));
      header("content-type: application/pdf");//for pdf file
      header('Accept-Ranges: bytes');
      header('Content-Transfer-Encoding: binary');
      echo $file;}
      ?>
     */

    $conn->close();
}
?>

