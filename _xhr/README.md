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

<br><br><br><br>

## sequence
```php
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = <<<DVF

DVF;


/* insert... */
$conn->query($sql);

/* update... */
$conn->query($sql);

/* select... */
$result = $conn->query($sql);
while( $row = $result->fetch_assoc() ) 
{
   echo $row["id"]. " : " . $row["un"]. "<br>";
}


$conn->close();
```


<br><br>

```php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```


### insert
```php
$sql = <<<DVF
    INSERT INTO `tn_1`(`un`) 
    VALUES ("$un");
DVF;


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

```


### update
```php
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
```


### select
```php

$sql = <<<DVF
    SELECT `id`, `un` 
    FROM `tn_1` 
    WHERE 1
DVF;


/* "SELECT `id`, `un` FROM `tn_1` WHERE 1"; */


$result = $conn->query($sql);

if ( $result->num_rows > 0 ) {
  /* output data of each row */
  while( $row = $result->fetch_assoc() ) {
    echo "id: " . $row["id"]. " - un: " . $row["un"]. " " . "<br>";
  }
} 
else {
  echo "0 results";
}
```


```php
$conn->close();
```
