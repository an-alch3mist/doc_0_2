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
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
```


```php
$conn->close();
```
