<?php
header("Access-Control-Allow-Origin:*");
	function connect(){
		mysql_connect("localhost","admin","adminadmin2012#");
		mysql_select_db("esummit_18");
	}
	connect();

$state = $_POST['state'];
$run = mysql_query("select * from `city` where `state`='$state' order by `city_name`");
$str = "<option value='select'>City</option>";
while($get=mysql_fetch_assoc($run)){
	$city = $get['city_name'];
	$str = $str."<option value='$city'>$city</option>";
}
echo $str;

?>
