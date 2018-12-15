<?php
header("Access-Control-Allow-Origin:*");
	function connect(){
		mysql_connect("localhost","mailminer","mailminer");
		mysql_select_db("esummit_18");
	}
	connect();

$city = $_POST['city'];
$run = mysql_query("select distinct `name` from `allcollege_trimmed` where `city`='$city' order by `name`");
$str = "<option value='select'>College</option>";
while($get=mysql_fetch_assoc($run)){
	$college = strtoupper($get['name']);
	$str = $str."<option value='$college'>$college</option>";
}
if($city!='select')
$str = $str."<option value='other'>Other</option>";
echo $str;

?>
