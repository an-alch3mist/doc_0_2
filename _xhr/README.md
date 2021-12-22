## xhr

```js

document.querySelector("._BOX_1_").addEventListener("submit", postName);


function postName(e)
{
    e.preventDefault();
    

    let un  = document.querySelector("._BOX_1_0_").value;
    
    let params = "un=" + un;

    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "server.php" , true);
    xhr.setRequestHeader("Content-type" , "application/x-www-form-urlencoded");

    xhr.onload = function()
    {
        console.log(xhr.responseText);
    }


    xhr.send(params);
}


```



## process.php

```php
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


```
