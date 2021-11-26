<!DOCTYPE html>
 
<head>
 
    <meta charset="utf-8"/>
 
    <style>
    *
    {
        padding : 0px;
        margin : 0px;
        text-decoration: none;
    }
 
    html
    {
        scroll-behavior: smooth;
    }
 
    body
    {
        text-size-adjust : 190%;
        font-family : monospace;
        font-weight: bold;
        color : #222;
 
        background : #eee;
        overflow-x: hidden;
    }
 
    ._BOX_0_
    {
        margin : 1rem auto;
 
        width : calc(100vw - 2 * 1rem - 1rem);
        max-width : calc(50rem - 2 * 1rem);
        padding : 1rem;
        border : 2px solid #222;
    }
 
    ._BOX_1_
    {
        margin : 1rem auto;
 
        width : calc(100vw - 1rem);
        max-width : calc(50rem);
 
        height: 4rem;
 
        border : 2px solid #222;
    }
 
 
    ._BOX_2_
    {
        
    }
 
 
 
    ._txt_area
    {
        display:block; 
        width:calc(100vw - 1rem - 2 * 1rem); 
        max-width:calc(50rem - 1rem - 2 * 1rem); 
 
        height : 8rem ; 
        min-height : 4rem;
        max-height : 30rem;
        resize : vertical;
 
        padding : 0.5rem;
        margin : 0.2rem auto 1rem auto;
        font-size : 0.8rem;
 
        border : 1px solid #222;
    }
 
    ._txt_area_link
    {
        display:block; 
 
        
        /*width:calc(100vw - 1rem - 2 * 1rem); */
        width : max-content;
        /*max-width:calc(10rem - 1rem - 2 * 1rem); */
        
        padding : 0.1rem;
        margin : 1rem auto 0rem auto;
 
        background-color : #fff;
        border: 1px solid #444;
        color: #333;                       
    }
 
 
 
 
 
 
 
 
    /* convert */
    ._BOX_4_convert
    {      
        width : max-content;
        padding :  0.5rem;
        border : 2px solid #222;
    }
    ._BOX_5_
    {
        display : flex ;
        width : calc(100vw - 2rem);
        margin : 2rem auto;
        max-width : 50rem;
    }
    ._BOX_5_convert_0 , ._BOX_5_convert_1
    {
        display:block;
        width : 50%;
 
        height : 8rem ; 
        min-height : 4rem;
        max-height : 30rem;
        resize : vertical;
    }
 
 
 
    </style>
 
</head>
 
 
 
<body>
 
    <div class = "_BOX_0_">
        &nbsp;&nbsp;
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel magna lacinia, vehicula mauris nec, euismod lacus. 
        Morbi tempus tortor risus, ut porttitor velit condimentum vel. Donec luctus odio purus, sed condimentum lorem tempus et. 
        Nunc vitae ipsum sapien. Aliquam viverra facilisis arcu. Vestibulum feugiat sapien sapien. 
        Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </div>
 
    <div class = "_BOX_1_">
 
    </div>
 
 
 
 
<?php
    function _quote_str($str) { return '"' . $str . '"'; }
  
  
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
    
 
    echo
    (
        <<<ETT
        <div style = "
            width : calc(100vw - 2rem);
            border : 1px dashed #222;
            height : 0px;
            margin : 2rem auto;
        ">
        </div>
        ETT
    );
 
 
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
 
            /*
            $sql = 
            <<<ETT
            SELECT * FROM `tn`
            ORDER BY `id` DESC;;
            ETT;
            */
 
 
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
 
 
 
?>
 
 
 
<script>
if ( window.history.replaceState ) 
{
  window.history.replaceState( null, null, window.location.href );
}
</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<div class= "_BOX_4_convert _BOX_4_convert_0"> Convert hex_to_txt ⇥ </div>
<div class= "_BOX_4_convert _BOX_4_convert_1"> Convert txt_to_hex ⇤ </div>
<div class = "_BOX_5_">
    <textarea class = "_BOX_5_convert_0" >&nbsp;&gt;</textarea>
    <textarea class = "_BOX_5_convert_1" >&nbsp;&lt;</textarea>
</div>
<br><br><br><br><br><br>
 
<script>
 
function hex_to_ascii(str1)
 {
    var hex  = str1.toString();
    var str = '';
    for (var n = 0; n < hex.length; n += 2) {
        str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
    }
    return str;
 }
 
 function ascii_to_hex(str)
  {
    var arr1 = [];
    for (var n = 0, l = str.length; n < l; n ++) 
     {
        var hex = Number(str.charCodeAt(n)).toString(16);
        arr1.push(hex);
     }
    return arr1.join('');
   }
   
console.log(hex_to_ascii('3132'));
console.log(hex_to_ascii('313030'));
 
 
 
function checkOnClick_0() 
{
    let str = document.querySelector("._BOX_5_convert_0").value;
    str = hex_to_ascii( str );
    console.log(".....");
    document.querySelector("._BOX_5_convert_1").value  =  str;
     
}
 
function checkOnClick_1() 
{
    let str = document.querySelector("._BOX_5_convert_1").value;
    str = ascii_to_hex( str );
    console.log(".....");
    document.querySelector("._BOX_5_convert_0").value  =  str;
     
}
 
 
document.querySelector("._BOX_4_convert_0").addEventListener("click", checkOnClick_0);
document.querySelector("._BOX_4_convert_1").addEventListener("click", checkOnClick_1);
</script>
 
 
 
 
 
 
 
 
</body>
 
 
 
 
 
</html>
 
