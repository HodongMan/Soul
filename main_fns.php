<?
require_once("db_connected.php");
require_once("main_html_fns.php");
function perf_register($perf_info, $user_email){

     	db_connect();
     	echo "<meta charset = 'utf-8'>";  
	$sql = "select * from user_info where user_email='$email'";

	$result = mysql_query($sql);
	if(!$result){
		echo("
           		<script>
             		window.alert('알 수 없는 오류가 발생했습니다.');
             		history.go(-1);
           		</script>
         			");
	}
	$row = mysql_fetch_array($result);
	$sql = "insert INTO perf_info(user_email, perf_name, perf_location, perf_time, perf_comment, perf_image_url) values ('".$user_email."', '".$perf_info['name']."', '".$perf_info['location']."', '".$perf_info['time']."', '".$perf_info['comment']."', '".$perf_info["image_url"]."')";

	$result = mysql_query($sql);
	
	if(!$result)
	{
       		echo"DB Error";
	}
	
	mysql_close();
	echo "<meta http-equiv='refresh' content='0; ./index.php'>";

}

function searching_data($keyword){

	db_connect();
	echo "<meta charset = 'utf-8'>";
	$sql = "select * from perf_info where perf_comment like '%$keyword%' order by perf_id desc limit 12";
	$result = mysql_query($sql);
	if(!$result){
		echo("
           		<script>
             		window.alert('검색 결과가 없습니다.');
             		history.go(-1);
           		</script>
         		");
	}

	while($row = mysql_fetch_array($result))
	{
		main_perf_card($row);echo("&nbsp");
	}

}

function show_perf_all(){

     	db_connect();
     	echo "<meta charset = 'utf-8'>";  
	$sql = "select * from perf_info order by perf_id desc limit 12";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		main_perf_card($row);echo("&nbsp");
	}

}
?>