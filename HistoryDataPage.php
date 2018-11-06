<html>
<head>
<meta http-equiv="refresh" content="5">
<title>HistoryDataPage for ECE4970 Demo</title>
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
    left:100px;
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
  .temperature_table {
   position:absolute;
	left:18%;
	top:15%;
  }
  .power_status_table {
   position:absolute;
	right:5%;
	top:15%;
  }
  img.tiger {
    width: 15%;
  }
  .button_location {
    position:absolute;
    right:15%;
    bottom:12%;
  }
  button.back_button {
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
  table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:20px;
	color:#333333;
	border-width: 2px;
	border-color: #999999;
	border-collapse: collapse;
}
  table.imagetable th {
	background:#b5cfd2;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
  table.imagetable td {
	background:#dcddc0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
  table.imagetable td.high_temp {
	background:#E74C3C;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
  td {
    text-align:center;
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
  <button class = back_button onclick="window.location.href='http://yihewang.epizy.com/ECE4970/RealTimePage.php'">Main Page</button>
</div>
<img src="tiger.png"  alt="Tiger" class = 'tiger'/>
   
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
?>
<div class = "temperature_table">
  <h3 class = "pos_left">Temperature History</h3>
	<table class = 'imagetable'>
        <tr>
            <th>Temperature</th>
            <th>Check Time</th>
        </tr>

<?php
$sql = "SELECT * FROM Temperature ORDER BY check_in_time DESC LIMIT 10 "; // select lastest 10 data
$result = mysqli_query($database,$sql); // use mysql_query() to send sql apply
  
while($row = mysqli_fetch_array($result)) // use while loop to send result from sql to array
{
	echo "<tr>";
  	if($row[temperature] > 5){
		 echo "<td class = 'high_temp'>".$row[temperature]." </td>"; 
    }
  	else{
      echo "<td>".$row[temperature]." </td>";
    }
	echo "<td>".$row[check_in_time]." </td>"; 
	echo "</tr>";
}
?>
  </table>
</div>

<div class = "power_status_table">
  <h3 class = "pos_left">Power Status History</h3>
	<table class = 'imagetable'>
        <tr>
            <th>Power Status</th>
            <th>Check Time</th>
        </tr>

<?php
$sql2 = "SELECT * FROM PowerStatus ORDER BY check_time DESC LIMIT 6 "; // select lastest 6 data
$result2 = mysqli_query($database,$sql2); // use mysql_query() to send sql apply
  
while($row = mysqli_fetch_array($result2)) // use while loop to send result from sql to array
{
	echo "<tr>";
	echo "<td>".$row[power_status]." </td>"; 
	echo "<td>".$row[check_time]." </td>"; 
	echo "</tr>";
}
?>
  </table>
<h4>Tips: Power Status '1' means regular power</h4>
<h4 style = "position:relative;left:45px;">Power Status '0' means battary power</h4>
</div>
  

</html>
  
  
  
  
  