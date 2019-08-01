<?php

    $con = mysqli_connect('127.0.0.1','root','');

    if(!con)
    {
        echo 'Not Connected to Server';
    }

    if(!mysqli_select_db($con,'government_id'))
    {
        echo 'Database not selected.';
    }
    $ad_name = $_POST['ad_name'];
    $ad_number = $_POST['ad_number'];
    $ph_no = $_POST['ph_no'];
    $gender = $_POST['gender'];
    $ad_dob = $_POST['ad_dob'];
    $ad_door_number = $_POST['ad_door_number'];
    $ad_city = $_POST['ad_city'];
    $ad_postal = $_POST['ad_postal'];

    $sql = "INSERT INTO aadhaar(aadhaar_number,full_name,dob,'address',phone_num,gender) VALUES('$ad_number','$ad_name','$ad_dob','$ad_door_number'+'$ad_city'+'$ad_postal','$ph_no','$gender')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not inserted';
    }
    else
    {
        echo 'Inserted';
    }

    header("refresh:2; url=thankyou.html");

?>