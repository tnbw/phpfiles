<?php

include 'dbconnection.php';

if ($conn->connect_error) {
    die($conn->connect_error);
}

if (isset($_POST['submit'])) {
    $stureg = "1000";

    $filename = $_FILES['fileToUpload']['tmp_name'];

    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
        if ($_FILES['fileToUpload']['type'] != "text/csv") {
            echo "<p>File must be in CSV format.</p>";
        } else {
            $file = fopen($filename, "r");

            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $sqlInsert = "INSERT INTO `student`(`nic`, `registrationNo`, `attempt`, `studentId`, `indexNo`, `firstName`, `lastName`, `password`, `Sub_ID`, `email`) VALUES ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "')";
                $result = mysqli_query($conn, $sqlInsert);
                
                
            }
            if ($result == 1)
                echo "<script type='text/javascript'>window.onload = function() {if(confirm('Successfully Uploaded the DP???????!')==true){window.location.href = '../eligibility_list.php';};};</script> "; // change this to redirect to the same page
            else
                echo "<script type='text/javascript'>window.onload = function() {if(confirm('Error occured')==true){window.location.href = '../eligibility_list.php';};};</script> "; // change this to redirect to the same page
        } #endIF
    } #en
    
    
    
    
    
    
    
    
    
    
    
//    echo 'two';
//
//    $name = ($_FILES['fileToUpload']['name']);
//    $f = ($_FILES['fileToUpload']['tmp_name']);
//
//    echo $name;
//    echo $f;
//
//
//    $file = fopen($name, "r");
//
//    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
//        //$sqlInsert = "INSERT INTO `student`(`nic`, `registrationNo`, `attempt`, `studentId`, `indexNo`, `firstName`, `lastName`, `password`, `Sub_ID`, `email`) VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."')";
//        // $result = mysqli_query($conn, $sqlInsert);
//
//        if (!isset($result)) {
//            echo "Done";
//        } else {
//            echo "Error";
//        }
//    }
//    if ($_FILES["fileToUpload"]["size"] > 0) {
    //      echo "three";
    //    $file = fopen($name, "r");
//        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
//            $sql = "INSERT INTO `student`(`nic`, `registrationNo`, `attempt`, `studentId`, `indexNo`, `firstName`, `lastName`, `password`, `Sub_ID`, `email`) VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."')";
//            $result = mysqli_query($conn, $sql);
//            if (!isset($result)) {
//                echo "Done";
//            } else {
//                echo "Error";
//            }
//        }
//
//        fclose($file);
    //   }





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

    /*
      $sql = "INSERT INTO student (
      student.nic,
      student.registrationNo,
      student.attempt,
      student.indexNo,
      student.firstName,
      student.lastName,
      student.password) VALUES ('".$nic."','".$regno."','".$attempt."','".$indexno."','".$firstname."','".$lastname."')";
     * 
     * 
     * 
     *      */
}
?>

