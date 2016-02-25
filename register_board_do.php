<?php


require_once("user_fns.php");
require_once("data_valid_fns.php");
require_once("db_connect.php");
require_once("board_fns.php");

session_start();

$title=$_POST['board_title'];
$content_text = $_POST["board_content"];
$user_id = $_SESSION["user_id"];
$time =  date("Y-m-d H:i:s",time());

if(isset($title) && isset($content_text) && isset($user_id) && isset($time)){

	$board_id = register_board_content($user_id, $title, $content_text, $time);

	echo "<meta http-equiv='refresh' content='0; ./user_board.php?board_id=$board_id'>";
}
else{
	echo "ERROR";
}

?>