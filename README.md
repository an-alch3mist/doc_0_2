```php

   
    $_setComm = "setComments";
    $_dt = "date";


    echo
    (
        <<<ETT
        <form method = "POST" action = "{$_setComm()}" >
            <input type = "text"   name = "un"  title="un" placeholder="un">
            <textarea              name = "mssg"  title = "mssg" placeholder="mssg"></textarea> 
            <input type = "submit" name = "c_submit" title="submit">
            <input type = "text"   value = "{$_dt("Y-m-d H:i:s")}....." title="dateTime">
        </form>
        ETT
    );

```


<br>


```php
 $_server = "sql211.epizy.com";
    $_username = "un";
    $_password = "";
    $_dbname = "dn";
  
  
 
    function setComments()
    {
 
        if (isset($_POST["c_submit"]))
        {
            $server = $_server;
            $username = $_username;
            $password = $_password;
            $dbname = $_dbname;
            $conn = mysqli_connect($server , $username , $password , $dbname);
 
            // Check connection
            if ($conn->connect_error) {
                echo("Connection failed: " . $conn->connect_error);
            }
            else
            {
                echo "Connected successfully";
 
                $un = $_POST["un"];
                $mssg = $_POST["mssg"];
 
                
                if(empty($un) || empty($mssg)) 
                {
                    echo ("<br>..............empty");
                }
                else
                {
                    $sql = 
                    <<<ETT
                    INSERT INTO `tn`(`un`, `m`) VALUES ("$un" , "$mssg");
                    ETT;
 
 
 
                    $result = $conn->query($sql);
 
                }
            }
            //echo ( "setComments...." );
        }
        //
 
 
    }

```


<br>
<br>



```php

function getComments()
    {
        $server = $_server;
        $username = $_username;
        $password = $_password;
        $dbname = $_dbname;
        $conn = mysqli_connect($server , $username , $password , $dbname);
 
        // Check connection
        if ($conn->connect_error) {
            echo("Connection failed: " . $conn->connect_error);
        }
        else
        {
 
 
 
 
            echo "Connected successfully...";
 
            $sql = 
            <<<ETT
            SELECT * 
            FROM `tn`
            ORDER BY `id` DESC
            LIMIT 10;
            ETT;            
 
 
 
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                $_row_id = $row["id"];
                $_row_un = $row["un"];
                $_row_m = $row["m"];
                $_row_dt = $row["dt"];
 
                echo ( 
                    <<<ETTO
                        <div class = "_txt_area_link" id = "$_row_id">
                        @...$_row_id ....... $_row_un.....<br>$_row_dt
                        </div>
 
                        <textarea class = "_txt_area" title = "$_row_un">$_row_m</textarea>
                        
                        
 
                    ETTO
 
                );
            }
            //
        }
 
        $_t = "time";
        echo ( 
        <<<ETTO
            {$_t()}
        ETTO
        );
 
        echo ( "<br><br><br><br><br><br><br><br><br><br><br>");
    }
 
    getComments();







```
