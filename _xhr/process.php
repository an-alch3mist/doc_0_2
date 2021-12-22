<?php

$un = $_POST["un"];

if(isset($un))
{
    echo ("name : ".$un);

    $servername = "sql211.epizy.com";
    $username = "epiz_30350228";
    $password = "rTJgPppeeXiETk";
    $dbname = "epiz_30350228_dn";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    /*
    $sql = <<<DVF
        INSERT INTO `tn_1`(`un`) 
        VALUES ("$un");
    DVF;


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
    */



    $t=time();
    $sql = <<<DVF
        UPDATE `tn_1` 
        SET `un`= "$t"
        WHERE `id`= 1;
    
    DVF;

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    

}


?>
