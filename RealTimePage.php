<html>
<head>
<meta http-equiv="refresh" content="5">
<title>Real Time Page for ECE4970 Demo</title>
<style>
  .top_color { 
    background-color:#2E2E2E; 
    width:100%; 
    height:60px
  }
   .button_color {
    background-color:#2E2E2E; 
    width:100%; 
    height:65px;
    position:absolute;
    bottom:0px;
  }
   p {
     color:#FFFFFF;
     font-style:italic;
     font-weight:bold;
     font-size:25px;
     position:absolute;
     right:60px;
     top:0px;
  }
  h3.pos_left {
    position:relative;
    left:80px;
  }
  h3.pos_left_little {
    position:relative;
    right:20px;
  }
  h3.fire {
    margin: 60px auto;
    font-family:"Comic Sans MS";
    font-size: 40px;
    color:#E74C3C;
    <!--text-shadow: 
      0 0 20px #FEFCC9,
      10px -10px 30px #FEF9E7,
      -20px -20px 40px #FFAE34,
      20px -40px 50px #EC760C,
      -20px -60px 60px #CD4606,
      0 -80px 70px #973716,
      10px -90px 80px #451B0E;-->
  }
  h3.normal {
    margin: 60px auto;
    font-family:"Comic Sans MS";
    font-size: 40px;
    color:#17202A;
  }
  label.right {
    position:relative;
    left: 100px;
  }
  label.effect {
    -webkit-text-fill-color: transparent;
    -webkit-text-stroke: 2px #17202A;
    font-size:30px;
    background: url(http://www.pencilscoop.com/demos/CSS_Text_Effects/images/galaxy.jpg);
    background-size: cover;
 
  }
  .itemlist_table {
   position:absolute;
	right:5%;
	bottom:38%;
  }
  .temperature {
   position:absolute;
	left:3%;
	top:45%;
  }
  .door_status {
    float:left;
   	 height:190px;
   	 width:300px;
  }
  .power_status {
   	 float:left;
   	 height:190px;
    width:300px;
    position:relative;
    left:30%;
  }
  .status {
    position:absolute;
    left:20%;
    top:12%;
  }
  #circle_red {
     width: 40px;
     height: 40px;
     background: red;
     -moz-border-radius: 20px;
     -webkit-border-radius: 20px;
     border-radius: 20px;
  }
  #circle_green {
     width: 40px;
     height: 40px;
     background: green;
     -moz-border-radius: 20px;
     -webkit-border-radius: 20px;
     border-radius: 20px;
  }
  .circle_move1 {
    position:relative;
    left:150px;
    bottom:100px;
  }
  .circle_move2 {
    position:relative;
    left:150px;
    bottom:40px;
  }
  .circle_move3 {
    position:relative;
    left:180px;
    bottom:100px;
  }
  .circle_move4 {
    position:relative;
    left:180px;
    bottom:40px;
  }
  img.tiger {
    width: 15%;
  }
  .button_location {
    position:absolute;
    left:45%;
    bottom:12%;
  }
  button.history_data_button {
	width: 150px; 
	height: 40px;
	border-width: 0px; 
	border-radius: 3px; 
	background: #1E90FF;
	cursor: pointer; 
	outline: none; 
	font-family: Microsoft YaHei; 
	color: white; 
	font-size: 17px;
}
  .power_duration {
    position:absolute;
    left:44%;
    bottom:40%;
  }
  td {
    text-align:center;
  }
  table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:15px;
	color:#333333;
	border-width: 2px;
	border-color: #999999;
	border-collapse: collapse;
}
  table.imagetable th {
	background:#b5cfd2;
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #999999;
}
  table.imagetable td {
	background:#dcddc0;
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #999999;
}
  
</style>
</head>
<body>
<div class = top_color>
  <p>University of Missouri-Columbia</p>
</div>
<div class = button_color>
  <p>ECE4970 Group7   Status Monitor Website</p>
</div>
<div class = button_location>
  <button class = history_data_button onclick="window.location.href='http://yihewang.epizy.com/ECE4970/HistoryDataPage.php'">History Data</button>
</div>
<img src="tiger.png"  alt="Tiger" class = 'tiger'/>
<div class = "itemlist_table">
  <h3 class = "pos_left">Table for ItemList</h3>
  <table class = "imagetable" border = 1 cellspacing=0 cellpadding=0 bordercolor=#000000>
        <tr>
            <th>SerialNumber</th>
            <th>ProductName</th>
            <th>ItemStatus</th>
        </tr>
<?php
// connect to DBMS
$servername = "sql104.epizy.com";
$username = "epiz_22438332";
$password = "yL8UIUdFE";
$dbname = "epiz_22438332_ECE4970";

// Create connection
$database = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($database->connect_error) {
    die("<p>Connection failed: " . $database->connect_error . "</p>");
}

//mysql_select_db($Student,$link); // choose table itemlist
$sql1 = "SELECT * FROM ItemList WHERE item_status = 1"; // execute mysql order
$result1 = mysqli_query($database,$sql1); // use mysql_query() to send sql apply
  
while($row = mysqli_fetch_array($result1)) // use while loop to send result from sql to array
{
	echo "<tr>";
	echo "<td>".$row[serial_number]." </td>"; 
	echo "<td>".$row[product_name]." </td>"; 
	echo "<td>".$row[item_status]." </td>"; 
	echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
   
<div class = "temperature">
<?php
$sql = "SELECT * FROM Temperature ORDER BY check_in_time DESC LIMIT 1 "; // select lastest 1 data
$result = mysqli_query($database,$sql); // use mysql_query() to send sql apply
  
while($row = mysqli_fetch_array($result)) // use while loop to send result from sql to array
{
  	if($row[temperature] > 5){
		 echo "<h3 class = 'fire' >Temperature(℃): ".$row[temperature]." </h3>"; 
    }
  	else{
      echo "<h3 class = 'normal' >Temperature(℃): ".$row[temperature]." </h3>";
    }
	echo "<h3 class = 'normal' >Check Time: ".$row[check_in_time]." </h3>"; 
}

?>
</div>

  
<div class = 'status'>
<div class = 'door_status'>
<?php
  	$sql = "SELECT COUNT(*) as count FROM DoorStatus"; // 
   $result = mysqli_query($database,$sql);
   $row = mysqli_fetch_assoc($result);
   $count = $row['count'];
	$sql2 = "SELECT * FROM DoorStatus ORDER BY check_time DESC LIMIT 1"; // 
   $result2 = mysqli_query($database,$sql2);
  	$row = mysqli_fetch_array($result2);
      
   echo "<label style='position:relative; left:100px;' class = 'effect'>DoorStatus</label><br><br>";
   echo "<label class = 'effect'>Open</label><br><br>";
   echo "<label class = 'effect'>Close</label>";
   if($count == 0){
     echo "<div id = 'circle_green' class = 'circle_move2'></div><br>"; // show the green circle 
    }//check if the table is empty                  
   else if($row[door_status]){
     echo "<div id = 'circle_red' class = 'circle_move1'></div><br>"; // show the red circle 
   }  
   else if(!$row[door_status]){
     echo "<div id = 'circle_green' class = 'circle_move2'></div><br>";// show the green cirlce 
   }
?>    
</div>
    
<div class = 'power_status'>
<?php
  	$sql = "SELECT COUNT(*) as count FROM PowerStatus"; // 
   $result = mysqli_query($database,$sql);
   $row = mysqli_fetch_assoc($result);
   $count = $row['count'];
	$sql2 = "SELECT * FROM PowerStatus ORDER BY check_time DESC LIMIT 1"; // 
   $result2 = mysqli_query($database,$sql2);
  	$row = mysqli_fetch_array($result2);
      
   echo "<label style='position:relative; left:125px;' class = 'effect'>PowerStatus</label><br><br>";
   echo "<label class = 'effect'>Regular</label><br><br>";
   echo "<label class = 'effect'>Battery</label>";
  	if($count == 0){
     echo "<div id = 'circle_green' class = 'circle_move3'></div><br>"; // show the green circle 
    }//check if the table is empty
   else if($row[power_status]){
     echo "<div id = 'circle_green' class = 'circle_move3'></div><br>"; // show the green circle 
   }  
   else if(!$row[power_status]){
     echo "<div id = 'circle_red' class = 'circle_move4'></div><br>";// show the red cirlce 
   }
?>    
</div> 
</div>
    <div class = 'power_duration'>
        <?php
        $sql6 = "SELECT COUNT(*) as count FROM PowerStatus"; // 
        $result6 = mysqli_query($database,$sql6);
        $row = mysqli_fetch_assoc($result6);
        $count = $row['count'];
        // echo "<p>".count."</p>"; 
        if($count == 1){
          /*echo "<table border = 1 cellspacing=0 cellpadding=0 bordercolor=#000000>
        		<tr><td class = 'duration_table'>Duration of Power</td></tr>
        		<tr><td class = 'duration_table'>Regular Power is On</td></tr>
      			</table>";*/
          
        }//for check the duration, check if there are at least two rows of data 
      	 else if($count > 1){
          $sql = "SELECT power_status FROM PowerStatus ORDER BY check_time DESC LIMIT 1,1"; // get last second line
          $sql2 = "SELECT power_status FROM PowerStatus ORDER BY check_time DESC LIMIT 1"; // get last line
        	$result1 = mysqli_query($database,$sql);
          $result2 = mysqli_query($database,$sql2);
        	$row = mysqli_fetch_array($result1);
          $row1 = mysqli_fetch_array($result2);
          if($row[power_status] == 0){
            //last second row equal to 0
           if($row1[power_status] == 1) {
             //last row equal to 1
             $sql1 = "SELECT check_time FROM PowerStatus ORDER BY check_time DESC LIMIT 1,1"; //time of second last line
             $sql2 = "SELECT check_time FROM PowerStatus ORDER BY check_time DESC LIMIT 1"; //time of last line
             $result1 = mysqli_query($database,$sql1);
          	  $result2 = mysqli_query($database,$sql2);
             $row = mysqli_fetch_array($result1);
             $row1 = mysqli_fetch_array($result2);
             $timediff = strtotime ($row1[check_time]) - strtotime ($row[check_time]);
             $d = floor($timediff/3600/24); //day
				  $h = floor(($timediff%(3600*24))/3600); //hour
             $m = floor(($timediff%(3600*24))%3600/60); //minute
             $s = floor(($timediff%(3600*24))%60); //second
             //echo "<h3>".$d."days".$h."hours".$m."minutes".$s."seconds </h3>"; 
             echo "<table class = 'imagetable'border = 1 cellspacing=0 cellpadding=0 bordercolor=#000000>
             <tr><th></th><th>Duration Of Power</th></tr>
             <tr><td>Days</td><td>".$d."</td></tr>
             <tr><td>Hours</td><td>".$h."</td></tr>
             <tr><td>Minutes</td><td>".$m."</td></tr>
             <tr><td>Seconds</td><td>".$s."</td></tr>
             </table>";
           } 
          }           
         }//check if last status of power is 0, which means switch to battery mode
        ?>
    </div>
</html>
  
  
  
  
  